<?php


namespace App\APIs\MorphAPIs\POSTagMapper\intermediate_formats;


trait LookupTablesWordnet {

    private function fieldPOS($letter)
    {
        return [
                   "a" => "adjective",
                   "n" => "noun",
                   "v" => "verb",
                   "r" => "adverb",
               ][ $letter ];
    }



    private function fieldPerson($letter)
    {
        return [
                   "1" => "first person",
                   "2" => "second person",
                   "3" => "third person",
               ][ $letter ] ?? null;
    }



    private function fieldNumber($letter)
    {
        return [
                   "s" => "singular",
                   "p" => "plural",
               ][ $letter ] ?? null;
    }



    private function fieldTense($letter)
    {
        return [
                   "p" => "present",
                   "i" => "imperfect",
                   "r" => "perfect",
                   "l" => "pluperfect",
                   "t" => "future perfect",
                   "f" => "future",
               ][ $letter ] ?? null;
    }



    private function fieldMood($letter)
    {
        return [
                   "i" => "indicative",
                   "s" => "subjunctive",
                   "n" => "infinitive",
                   "m" => "imperative",
                   "p" => "participle",
                   "d" => "gerund",
                   "g" => "gerundive",
                   "u" => "supine",
               ][ $letter ] ?? null;
    }



    private function fieldVoice($letter)
    {
        return [
                   "a" => "active",
                   "p" => "passive"
               ][ $letter ] ?? null;
    }



    private function fieldGender($letter)
    {
        return [
                   "m" => "masculine",
                   "f" => "feminine",
                   "n" => "neuter",
                   // communis?
                   "c" => "masculine",
               ][ $letter ] ?? null;
    }



    private function fieldCase($letter)
    {
        return [
                   "n" => "nominative",
                   "g" => "genitive",
                   "d" => "dative",
                   "a" => "accusative",
                   "b" => "ablative",
                   "v" => "vocative",
                   "l" => "locative",
               ][ $letter ] ?? null;
    }



    private function fieldDegree($letter, $ReturnPositiveDegree = false)
    {
        $positive = $ReturnPositiveDegree ? "positive" : null;

        return [
                   "p" => "positive",
                   "c" => "comparative",
                   "s" => "superlative",
               ][ $letter ] ?? $positive;
    }



    private function fieldConjugation($letter)
    {
        return [
                   "1" => "conj_a",
                   "2" => "conj_e",
                   "3" => "conj_k",
                   "4" => "conj_i",
               ][ $letter ] ?? null;
    }


    private function fieldDeclination($letter)
    {
        return [
                   "1" => "decl_a",
                   "2" => "decl_o",
                   "3" => "decl_k",
                   "4" => "decl_u",
                   "5" => "decl_e",
               ][ $letter ] ?? null;
    }



    private function fieldVerbSuffix($letter)
    {
        return [
                   "i" => "i_stem",
               ][ $letter ] ?? null;
    }

    private function fieldNounSuffix($letter)
    {
        return [
                   "r" => "r_stem",
               ][ $letter ] ?? null;
    }
    private function fieldAdjectiveSuffix($letter)
    {
        return [
                   "i" => "i_stem",
               ][ $letter ] ?? null;
    }



}