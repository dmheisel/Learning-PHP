# Learning PHP - My Notes

Learning PHP from the point of view of someone who knows javascript pretty decently, working through each step of the way.

---

# Table of Contents

- [Learning PHP - My Notes](#learning-php---my-notes)
- [Table of Contents](#table-of-contents)
- [Basic Language Syntax:](#basic-language-syntax)
  - [Concatenation:](#concatenation)
- [Arrays:](#arrays)
  - [Array methods:](#array-methods)
  - [More Array Methods!:](#more-array-methods)
  - [Arrays as objects/dict](#arrays-as-objectsdict)
  - [Additional array methods with keys/values](#additional-array-methods-with-keysvalues)
- [Strings](#strings)
  - [String Methods](#string-methods)
- [Loops](#loops)
  - [For Loops:](#for-loops)
    - [Standard For Loop](#standard-for-loop)
    - [Foreach Loop](#foreach-loop)
  - [While Loop](#while-loop)
    - [Flow Statements](#flow-statements)
- [Functions](#functions)
- [Objects](#objects)
  - [Classes](#classes)
  - [Inheritance](#inheritance)
    - [Public and Private class methods:](#public-and-private-class-methods)
- [Math operations:](#math-operations)
  - [Absolute value](#absolute-value)
  - [Rounding](#rounding)
  - [Square Roots](#square-roots)
  - [Random Numbers](#random-numbers)
  - [Number Convertors](#number-convertors)
    - [Decimal to Binary](#decimal-to-binary)
    - [Decimal to Hexadecimal](#decimal-to-hexadecimal)
    - [Decimal to Octal](#decimal-to-octal)
    - [Other base systems](#other-base-systems)
- [Date and Time](#date-and-time)
  - [date()](#date)
  - [time()](#time)
  - [mktime()](#mktime)

# Basic Language Syntax:

- PHP is often included directly in HTML files, and declared with a php tag like `<?php ...your code here ?>`
- Variables are declared like `$name = "David"` or `$age = 35`
- To print code -- to the terminal or to a webpage if included in an html tag -- use `echo`
- All lines should end in semicolon
- echo `"\n"` to print to a new line
- `print_r()` will print readable information about whatever variable is passed in -- such as an array.

## Concatenation:

- Use `.` to concatenate strings. `echo "\nHello " . "World!"` will print "Hello World!" to a new line

# Arrays:

- arrays are declared similarly to variables: `$myArray = [1, 1, 2, 3, 5, 8, 13]`
- arrays are zero-indexed, so indices in array are accessed similarly to js: `echo $myArray[2]` will print 2.

## Array methods:

- `count($array)`: using count will display the length of the array. `echo count($myArray)` will print 7
- `reset($array)`: reset resets the internal iteration pointer to the first index and returns the first index -- this means that it will print `1` and any iteration that would have been going over `$myArray` will be set back to 0.
- `array_push($array, item)`: adds item to the end of the array. `array_push($myArray, 21)` will add 21 to the end of \$myArray.
- `array_pop($array)`: removes the last item from the array. `array_pop($myArray)` will remove the newly added 21.
- Likewise, `array_shift($myArray)` will remove the first item, and `array_unshift($myArray, item)` will add `item` to the beginning of the array.

## More Array Methods!:

- `array_merge($array1, $array2)` will concatenate the two arrays together -- all of array1, then all of array 2 will be in the new array the merge method returns.
- `sort($array)` will sort the array - it does not return a new version, just sorts it in place. This can't be used to declare a new array.
- `array_slice($array)` and `array_splice($array)` work similarly -- both return a new array

## Arrays as objects/dict

Arrays are keyed, by default each value is given its index in the array as a key. But you can provide them with different keys than just the index!

They are set up slightly different when declaring, for example:

```
$phone_numbers = [
  "Alex" => "415-235-8573",
  "Jessica" => "415-492-4856",
]
```

These keys can be accessed much like in js -- `$phone_numbers["Alex"]`
Similarly, keys can be added with the same bracket notation: `$phone_numbers["David"] = "218-750-2287"` would add my phone number to the list with the key "David"

## Additional array methods with keys/values

- `array_key_exists(keyName, $array)` lets you check if keyName is in the array:

```
if (array_key_exists("Alex", $phone_numbers)) {
    echo "Alex's phone number is " . $phone_numbers["Alex"] . "\n";
} else {
    echo "Alex's phone number is not in the phone book!";
}
```

- `array_keys($array)` and `array_values($array)` will return all the keys or values from the array in their own indexed array.

# Strings

- Variables can contain strings as their value, as seen above.
- `$greeting = "Hello"`, `$name = "David"` -- these can be concatenated together also with `.`

## String Methods

- `strlen($string)` will return the length of the string
- `substr($string, #)` will cut everything from the string before the index of the number provided.
- `explode(delimiter, $string)` and `implode(joiningChar, $array)` take the place of split(delimiter) and join(joiningChar)

eg:

```
$fruits = "apple,banana,orange";
$fruit_list = explode(",", $fruits);
echo "The second fruit in the list is $fruit_list[1]";
```

```
$fruit_list = ["apple","banana","orange"];
$fruits = implode(",", $fruit_list);
echo "The fruits are $fruits";
```

# Loops

## For Loops:

For loops -- for looping over iterable lists - work and look similar to what we know in javascript
Two major types of for loops:

### Standard For Loop

These look just like regular javascript for loops, with syntax changed for php variable declarations.

- The first part is the initialization point: `$i = 0` - begin with \$i (index) at 0
- Followed by the stop condition: `$i < count($fibbArray)` -- the loop stops if this is not true.
- The last is how to increase the iteration: `$i++` -- every loop, increase \$i by 1.
- Brackets follow the loop to contain the code for what you want the loop to do on each iteration.
  Use a semicolon to split sections of the loop declaration

```
$fibbArray = [1, 1, 2, 3, 5, 8, 13, 21, 34];
for ($i = 0; $i < count($fibbArray); $i++) {
  $fibbNumber = $fibbArray[$i];
  echo $fibbNumber . "\n";
}
```

### Foreach Loop

These are similar to javascript's For/Of or For/In loops, or using the array.forEach() method.

- name the array you are iterating over: `$fibbArray`
- declare a temporary name for each item in the iteration: `$fibbNumber`
- and like above, brackets around whatever you want to do with each item in the array.

```
$fibbArray = [1, 1, 2, 3, 5, 8, 13, 21, 34];
forEach($fibbArray as $fibbNumber) {
  echo $fibbNumber . "\n";
};
```

Foreach loops are good with arrays with custom keys, as well:

- in the foreach parens, declare $key => $value for each pair. Both can be manipulated/used in the code brackets.

```
$phone_numbers = [
  "Alex" => "415-235-8573",
  "Jessica" => "415-492-4856",
];

foreach ($phone_numbers as $name => $number) {
  echo "$name's number is $number.\n";
}
```

## While Loop

Also similar to javascript while loops - set a stop condition, and continue to loop until that condition is met.

**Make sure the stop condition will be met or it will loop infinitely and generally cause problems!**

For Loops are generally for looping over iterables (eg. arrays), but While Loops can be used to continue doing just about anything until the stop condition is met. For example this will simply print the counter every time until it hits 10:

```
$counter = 0;

while ($counter < 10) {
    $counter += 1;
    echo "Executing - counter is $counter.\n";
}
```

While loops are generally best used when you don't know how many times it may take to meet the stop condition, and you want to continue doing that code until it does.

### Flow Statements

- `break` -- this will immediately "break" the loop and quit out of the code block.
- `continue` -- returns to the top of the while loop and checks the condition again, ignoring anything below it. Loop continues.

# Functions

Functions work similarly to in js and look similar as well, with php's specific styling in place.

Functions that are included in php code library are called Library functions (these are things like strlen() or array_push()). Functions created by the user are called User functions.

Functions are declared thusly: `function funcName($args){ //...do something here... }`
Within the function block, use the same `return` to return whatever value you want the function to get.

Simple example of a function:

```
function addinate($x, $y) {
    return $x + $y;
  }
```

# Objects

Now the meat of it!
PHP is object oriented, though not strictly.

In object oriented programming, a `class` is a definition of an `object`, whereas an `object` is an instance of an `object`, meaning that from one `class` you can create many `object`s.

## Classes

Classes are the definition -- they don't contain data, but do contain the structure of the object being defined. They describe what information the object will hold and what methods it can perform. Think of a class like a blueprint for creating the object.

A person could be described as a `class` thusly:

```
class Person {
  //constructor function
  public function __construct($firstName, $lastName) {
    //any time a Person object is made, pass it a firstName and lastName, and then those can be accessed through $Person->firstName
    $this->firstName = $firstName;
    $this->lastName = $lastName;
  }

  public function greet() {
    echo "Hi!  My name is $this->firstName $this->lastName!\n";
  }
}
```

A few things to point out:

- Constructor function: every class needs to have a `public function __construct($args)` -- this will be how we make new objects of this class.
- use of -> instead of dot notation like in js.
- keyword public -- this means the function can be called from outside the class. private methods can only be called by something else within the same class.
  To follow up:

```
$jessica = new Person("Jessica", "Heisel");
$jessica->greet();
```

- Again, note the -> arrow function instead of . Calling the greet() function on the Person class is done like `$objectName->functionName()`
- Note the constructor function - caps Person, passing in the arguments for `$firstName` and `$lastName`

## Inheritance

Inheritance is a key concept of object oriented programming.
Inheritance allows us to take code written elsewhere for another class, and re-use it with this new class that `extends` the first one.

A class that extends another class is called a _child_ class, and the one it is inheriting from is the _parent_ class.

Syntax is thus:

```
class Student extends Person {
  //inheritance!  students are a child of Person, taking in first and last name and also a shcool name and id number.
  public function __construct($firstName = null, $lastName = null, $schoolName = null, $idNumber = null) {
    parent::__construct($firstName, $lastName);
    $this->schoolName = $schoolName;
    $this->idNumber = $idNumber;
  }

  public function giveSchoolInfo() {
    echo "I attend $this->schoolName and my school ID number is $this->idNumber.\n";
  }
}
```

-- Note that the Student did not have the greet() function specifically declared, but calling it will still work!

```
$david = new Student("David", "Heisel", "Prime Digital Academy", "158051");
$david->greet();
$david->giveSchoolInfo();
```

Both greet() and giveSchoolInfo() are methods of the Student class. Greet is given to Student for free from the Person class that it extends.

### Public and Private class methods:

Briefly touched on above, but `public` and `private` modifiers allow us to let some functions only be accessible within the object itself, and others to be accessable outside.

For example:

```
// for external use
 public function say_name() {
     echo "My name is " . $this->full_name() . "\n";
 }

 // for internal use
 private function full_name() {
     return $this->first_name . " " . $this->last_name;
 }
```

calling student->full_name() won't work outside the object, but student->say_name() will, and will call full_name() for us.

# Math operations:

There are several built-in math functions in PHP, let's hit a few of them.

## Absolute value

`abs()` returns the absolute value of a number, for example:

```
echo abs(-5) //this will return 5
```

## Rounding

`ceil()` will round a fraction UP to the next integer
`floor()` will round a fraction DOWN to the next integer

```
echo ceil(4.2) //output is 5
echo floor(4.2) //output is 4
```

## Square Roots

`sqrt()` Finds the square root of a number.

```
echo sqrt(25) //output is 5
```

## Random Numbers

`rand()` will return a random number.
Optionally, you can pass it a min and max number to return a random number between.

```
echo rand(10,100) //outputs a random number between 10 and 100
```

## Number Convertors

### Decimal to Binary

`decbin()` and `bindec()` convert numbers from decimal to binary and vice versa, respectively.

### Decimal to Hexadecimal

`dechex()` and `hecdex()` convert numbers from decimal to hexadecimal and vice versa, respecitvely.

### Decimal to Octal

`decoct()` and `octdec()` conver numers from decimal to octal and back, respecitvely.

### Other base systems

`base_convert()` will convert a base number to whatever other base number you pass -- arguments should be aligned as:

`base_convert(number, frombase, tobase)`

# Date and Time

## date()

PHP has a built in `date()` function that will convert a timestamp to a much more readable date and time, instead of the UNIX timestamp that a computer records time in.

`date()` takes two parameters, _format_ and _timestamp_. The format is required, but timestamp is optional -- if it's not passed the function will use the current time. So something like this:

```
echo date('m/d/Y') // will return current date in mm/dd/YYYY format such as 11/27/2019

echo date('F d, Y h:i:s A') //will return the current time and date, written out as November 27, 2019 11:51 A.M.
```

## time()

Similarly, the `time()` function will return the current UNIX format timestamp.

## mktime()

Lastly, you can use `mktime()` to get a timestamp for a specific date/time. Specific syntax is:

mktime(_hour_, _minute_, _second_, _month_, _day_, _year_)

This can be used to get a time in the future, or past, and convert it to a new date, like:

```
$futureDate = mktime(0, 0, 0, date("m")+30, date("d"), date("Y"));
echo date("d/m/Y", $futureDate);
```
