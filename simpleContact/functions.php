<?php

function getContacts() {
    $serializedData = file_get_contents('contact_info.txt');
    return unserialize($serializedData);
}

function putContacts($contactInfo) {
    $stringifyData = serialize($contactInfo);
    file_put_contents('contact_info.txt', $stringifyData);
}