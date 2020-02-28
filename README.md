# POSTagMapper

API-class that will map morph-tags (e.g. of the Latin Wordnet-API to human readable form.


## Usage
        $POSTagMapper = new POSTagMapper("v-prppnb3i", $format = "wordnet");

        return $POSTagMapper->map()->getIntermediateJson();
        
        // ... will return:
        // {"pos":"verb","person":null,"number":"plural","tense":"perfect","mood":"participle","voice":"passive","gender":"neuter","case":"ablative","conjugation":"conj_k","suffix":"i_stem"}

You can convert these tags to your own format by using the name of a JSON-File inside the output-formats-Folder as an argument to the `convert()`-method:

       $POSTagMapper = new POSTagMapper("v-prppnb3i", $format = "wordnet");

        return $POSTagMapper->map()->convert("de")->getConvertedJson();
        // ... will return 
        // {"Wortart":"Verb","Person":"","Numerus":"Pl.","Tempus":"Perfekt","Modus":"Partizip","Genus verbi":"Passiv","Genus":"neutrum","Kasus":"Ablativ","Konjugationsklasse":"konsonantische Konjugatin","Stammerweiterung":""}

More Input- and Output-formats are planned.        
Feel free to fork, pull or comment.
