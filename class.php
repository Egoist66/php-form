<?php 

require_once './oop.php';

use FamilySpace\Family;

$family->setName('Peter', 'boy');


// class Person {
//      public function __construct(public string $name, public int $age) {
//           $this->age = $age;
//           $this->name = $name;
//      }

//      public function __destruct(){
//           echo __METHOD__ . ' ' . 'initiated!';
//      }
// }
// $me = new Person('Farid', 26);
// unset($me);



class Person
{ 
    public $name;
    function __construct($name)
    {
        $this->name = $name;
    }
    final protected function displayInfo()
    {
        echo "Имя: $this->name<br>";
    }
}
class Employee extends Person 
{
    public $company;
    public function __construct($name, $company){
        parent::__construct($name);
        $this->company = $company;
    }
    public function displayEmployeeInfo()
    {
        parent::displayInfo();
        echo "Работает в $this->company<br>";
    }

    static public function getName(self $person, string $prop): string{
     return $person->$prop;
    }

    static public function generateInstance(string $name, string $company){
     return new self($name, $company);
    }
}
 
//echo Employee::getName(new Employee("Tom", "Microsoft"), 'name');
//var_dump(Employee::generateInstance('Jack', 'forte-group'));

$str = <<<Label
Hi hello
Label;






// Интерфейс для наблюдателя
interface Observer {
    public function update($data);
}

// Конкретный наблюдатель
class ConcreteObserver implements Observer {
    public function update($data) {
        echo "Получено обновление: " . $data . "\n";
    }
}

// Класс, за которым нужно наблюдать
class Subject {
    private $observers = [];

    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer) {
        $index = array_search($observer, $this->observers);
        if ($index !== false) {
            unset($this->observers[$index]);
        }
    }

    public function notify($data) {
        foreach ($this->observers as $observer) {
            $observer->update($data);
        }
    }
}

// Пример использования
$subject = new Subject();

$observer1 = new ConcreteObserver();
$observer2 = new ConcreteObserver();

$subject->attach($observer1);
//$subject->notify("Новое сообщение!");




class Constructor {
    private int $num;

    public function __construct($name){
        $this->num = $name;
       

    }

    public function __destruct(){
        echo "object is destructed";

        
    }
}

// $obj = new Constructor(6);
// var_dump($obj);


abstract class Admin {
    public function getId(){
        echo '#44wrewvdsfsw43';
    }
}

class Admin1 extends Admin {
   
}

const adm = new Admin1();
adm->getId();

