<?php

namespace App\dao;

use entities\Product;

interface ProductInterface
{

    public function save($entity);

    public function edit($entity);

    public function deleteById($id);

    public function findAll();

}