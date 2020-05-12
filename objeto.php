<?php
class objeto
{
    protected $object1;
    protected $object2;
    protected $object3;

    public function multiply($objeto){
        return $objeto->getObject1()*$objeto->getObject2()*$objeto->getObject3();
    }

    public function getObject3()
    {
        return $this->object3;
    }

    public function setObject3($object3)
    {
        $this->object3 = $object3;
    }

    public function getObject2()
    {
        return $this->object2;
    }

    public function setObject2($object2)
    {
        $this->object2 = $object2;
    }

    public function getObject1()
    {
        return $this->object1;
    }

    public function setObject1($object1)
    {
        $this->object1 = $object1;
    }

}

$objeto = new objeto();
$objeto->setObject1(2);
$objeto->setObject2(5);
$objeto->setObject3(15);
echo $objeto->multiply ($objeto);
