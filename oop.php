<?php 


// class Users {
//      public array $users = [];
   

    
//      public function addUser(string $name, int $age): void {
//           $this->users = [...$this->users, [
//                "name" => $name,
//                "age" => $age
//           ]];
//      }

//      public function getUsers(): array {
//           return $this->users;
//      }

// }



// $user = new Users();
// $user->addUser('Jack', 28);
// $user->addUser('Farid', 27);


// echo "<pre>";
// print_r($user);

// echo "</pre>";

namespace FamilySpace;

class Family {
     private string $boy;
     private string $girl;


     public function setName(string $name, $type): void {
          if($type === 'boy'){
               $this->boy = $name;

          }
          else if($type === 'girl'){
               $this->girl = $name;
          }
     }
}

$family = new Family();

$family->setName('farid', 'boy');



echo "<pre>";
print_r($family);

echo "</pre>";
