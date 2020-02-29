<?php


namespace App\APIs\POSTagMapper;

/**
 * Will convert ConLL-String(???) to human-readable format
 * Class POSTagConverter
 * @package App\APIs\MorphAPIs
 */
class POSTagMapper {

    /**
     * @var string
     */
    private $POSString;
    private $field_pos;
    private $field_number;
    private $field_person;
    private $field_tense;
    private $field_mood;
    private $field_voice;
    private $field_gender;
    private $field_case;
    private $field_degree;
    /**
     * @var POSTagMapper_Wordnet
     */
    private $FormatConverter;
    private $ConversionFormat;
    /**
     * @var array
     */
    private $ConvertedFormat;



    /**
     * POSTagMapper constructor.
     * @param string $POSString
     * @param string $InputFormat
     */
    public function __construct(string $POSString, string $InputFormat = "wordnet")
    {
        $this->POSString = $POSString;
        switch ($InputFormat) {
            case 'wordnet':
                $this->FormatConverter = new POSTagMapper_Wordnet($POSString);
                break;
            case 'cltk':
                $this->FormatConverter = new POSTagMapper_CLTK($POSString);
                break;
            case 'perseus_treebank':
                $this->FormatConverter = null;
                break;

        }


    }



    /**
     * Will map $POSString to intermediate human readable format
     * that can be converted to another format
     * @return $this
     */
    public function map()
    {
        $this->FormatConverter->read();

        return $this;
    }



    /**
     * @return mixed
     */
    public function getIntermediateArray()
    {
        return $this->FormatConverter->getArray();
    }



    /**
     * @return false|string
     */
    public function getIntermediateJson()
    {
        return json_encode($this->FormatConverter->getArray());
    }



    /**
     * @return array
     */
    public function getConvertedArray()
    {
        return $this->ConvertedFormat;
    }



    public function getConvertedValuesArray()
    {
        return array_values($this->ConvertedFormat);
    }



    /**
     * @return false|string
     */
    public function getConvertedJson()
    {
        return json_encode($this->ConvertedFormat);
    }



    /**
     * Iterates over given values in JSON-File and substitutes keys and values
     * @param string $OutputFormat
     * @return $this
     */
    public function convert(string $OutputFormat)
    {
        $this->ConversionFormat = json_decode(file_get_contents(base_path("app/APIs/POSTagMapper/output_formats/" . $OutputFormat . ".json")), true);
        $this->ConvertedFormat = [];
        foreach ($this->getIntermediateArray() as $IntermediateFormatKey => $IntermediateFormatValue) {
            $Key_Translated = $this->ConversionFormat[ $IntermediateFormatKey ]["key"];
            $Value_Translated = $this->ConversionFormat[ $IntermediateFormatKey ]["values"][ $IntermediateFormatValue ] ?? '';
            $this->ConvertedFormat[ $Key_Translated ] = $Value_Translated;
        }

        return $this;
    }



    private function readFields($InputFormat)
    {
        switch ($InputFormat) {
            case 'perseus_treebank':
                $this->field_pos = $this->POSString[1];
                $this->field_person = $this->POSString[2];
                $this->field_number = $this->POSString[3];
                $this->field_tense = $this->POSString[4];
                $this->field_mood = $this->POSString[5];
                $this->field_voice = $this->POSString[6];
                $this->field_gender = $this->POSString[7];
                $this->field_case = $this->POSString[8];
                $this->field_degree = $this->POSString[9];
                break;
            default:
                $this->field_pos = $this->POSString[1];
                $this->field_person = '';
                $this->field_number = '';
                $this->field_tense = '';
                $this->field_mood = '';
                $this->field_voice = '';
                $this->field_gender = '';
                $this->field_case = '';
                $this->field_degree = '';
                break;
        }

    }
}