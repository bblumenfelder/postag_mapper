<?php


namespace App\APIs\MorphAPIs\POSTagMapper;

use App\APIs\MorphAPIs\POSTagMapper\intermediate_formats\LookupTablesWordnet;

/**
 * Will map morpho-String of Latin Wordnet API to human readable format
 * @package App\APIs\MorphAPIs
 */
class POSTagMapper_Wordnet extends POSTagMapper {

    use LookupTablesWordnet;
    /**
     * @var string
     */
    private $POSString;
    private $POS;
    public  $MorphArray;
    private $Person;
    /**
     * @var array
     */
    private $Number;
    /**
     * @var array
     */
    private $Tense;
    /**
     * @var array
     */
    private $Mood;
    /**
     * @var array
     */
    private $Voice;
    /**
     * @var array
     */
    private $Gender;
    /**
     * @var array
     */
    private $Case;
    /**
     * @var array
     */
    private $Degree;
    private $Conjugation;
    private $Suffix;
    private $Declination;



    public function __construct(string $POSString)
    {
        $this->POSString = $POSString;
    }



    public function getArray()
    {
        return $this->MorphArray;
    }



    /**
     * Will read string fields based on POS given
     * in the first field
     */
    public function read()
    {
        $this->readPOS();
        switch ($this->POS) {
            case 'verb':
                $this->readPerson()
                    ->readNumber()
                    ->readTense()
                    ->readMood()
                    ->readVoice()
                    ->readGender()
                    ->readCase()
                    ->readConjugation()
                    ->readVerbSuffix();
                break;
            case 'noun':
                $this->readNumber()
                    ->readGender()
                    ->readCase()
                    ->readDeclination()
                    ->readNounSuffix();
                break;
            case 'adjective':
                $this->readDegree()
                    ->readNumber()
                    ->readGender()
                    ->readCase()
                    ->readAdjectiveSuffix();
                break;
            case 'adverb':
                $this->readDegree();
                break;

            default:

                break;
        }
    }



    private function readPOS()
    {

        $this->POS = $this->fieldPOS($this->POSString[0]);
        $this->MorphArray['pos'] = $this->POS;

        return $this;
    }



    private function readPerson()
    {
        $this->Person = $this->fieldPerson($this->POSString[1]);
        $this->MorphArray['person'] = $this->Person;

        return $this;
    }



    private function readNumber()
    {
        $this->Number = $this->fieldNumber($this->POSString[2]);
        $this->MorphArray['number'] = $this->Number;

        return $this;
    }



    private function readTense()
    {
        $this->Tense = $this->fieldTense($this->POSString[3]);
        $this->MorphArray['tense'] = $this->Tense;

        return $this;
    }



    private function readMood()
    {
        $this->Mood = $this->fieldMood($this->POSString[4]);
        $this->MorphArray['mood'] = $this->Mood;

        return $this;
    }



    private function readVoice()
    {
        $this->Voice = $this->fieldVoice($this->POSString[5]);
        $this->MorphArray['voice'] = $this->Voice;

        return $this;
    }



    private function readGender()
    {
        $this->Gender = $this->fieldGender($this->POSString[6]);
        $this->MorphArray['gender'] = $this->Gender;

        return $this;
    }



    private function readCase()
    {
        $this->Case = $this->fieldCase($this->POSString[7]);
        $this->MorphArray['case'] = $this->Case;

        return $this;
    }



    private function readDegree()
    {
        $this->Degree = $this->fieldDegree($this->POSString[1]);
        $this->MorphArray['degree'] = $this->Degree;

        return $this;
    }



    private function readConjugation()
    {
        $this->Conjugation = $this->fieldConjugation($this->POSString[8]);
        $this->MorphArray['conjugation'] = $this->Conjugation;

        return $this;
    }



    private function readDeclination()
    {
        $this->Declination = $this->fieldDeclination($this->POSString[8]);
        $this->MorphArray['declination'] = $this->Declination;

        return $this;
    }



    private function readVerbSuffix()
    {
        $this->Suffix = $this->fieldVerbSuffix($this->POSString[9]);
        $this->MorphArray['suffix'] = $this->Suffix;

        return $this;
    }



    private function readNounSuffix()
    {
        $this->Suffix = $this->fieldNounSuffix($this->POSString[9]);
        $this->MorphArray['suffix'] = $this->Suffix;

        return $this;
    }



    private function readAdjectiveSuffix()
    {
        $this->Suffix = $this->fieldAdjectiveSuffix($this->POSString[9]);
        $this->MorphArray['suffix'] = $this->Suffix;

        return $this;
    }



}