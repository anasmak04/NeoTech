<?php

interface ProductInterface {
    public function save($name, $description, $price);
    public function edit($id, $name, $description, $price);
    public function deleteById($id);
    public function findAll();

}