<?php

namespace neyric\Qonto\Core;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class ApiSerializer
{

    private $_serializer;

    public function __construct()
    {
        // Extract porperty infos from PhpDoc annotations
        $objectNormalizer = new ObjectNormalizer(null, null, null, new PhpDocExtractor());

        // Note: we use the serializer only for its chain-of-responsability on normalizers,
        //       so we don't need any encoder
        $this->_serializer = new Serializer([
            new DateTimeNormalizer(),
            new ArrayDenormalizer(),
            $objectNormalizer,
        ], []);
    }

    public function denormalize($data, $class)
    {
        return $this->_serializer->denormalize($data, $class);
    }

}