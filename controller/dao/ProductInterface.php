<?php

interface ProductInterface {
    public function create($name, $description, $price);
    public function edit($id, $name, $description, $price);
    public function deleteById($id);
    public function findAll();

}