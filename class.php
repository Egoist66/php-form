<?php 
declare(strict_types=1);

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



abstract  class Admin {

    abstract public function getId() : string;
}

class Admin1 extends Admin {
  
 
   public function getId() : string {
       return 'hello';
   }
}

// const adm = new Admin1();
// echo adm->getId();


class Constructor {
    private int $num;



    public function __construct($name){
        $this->num = $name;
       

    }

    public function __destruct(){
        echo "object is destructed";

        
    }

    public function __set($name, $value){
        $this->$name = $value;
    }

    public function __get(string $name){
        if(isset($this->$name)){
            return $this->$name;
        }
        return "Such property: '$name' does not exist";
    }

    public function __toString(){
        return json_encode($this);
    }
}

echo "<pre>";


$obj = new Constructor(6);

echo $obj;
echo $obj->num . "<br><br>";

var_dump($obj);

echo "</pre>";




enum MyExceptionCase {
    case InvalidMethod;
    case InvalidProperty;
    case Timeout;
}

class MyException extends Exception {
    function __construct(private MyExceptionCase $case){
        match($case){
            MyExceptionCase::InvalidMethod      =>    parent::__construct("Bad Request - Invalid Method", 400),
            MyExceptionCase::InvalidProperty    =>    parent::__construct("Bad Request - Invalid Property", 400),
            MyExceptionCase::Timeout            =>    parent::__construct("Bad Request - Timeout", 400)
        };
    }
}

try {
    throw new MyException(MyExceptionCase::InvalidMethod);
} catch (MyException $myE) {
    echo $myE->getMessage();  // Bad Request - Invalid Method
}