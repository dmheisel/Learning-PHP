# Learning PHP - My Notes

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

## Basic Language Syntax:

- PHP is often included directly in HTML files, and declared with a php tag like `<?php ...your code here ?>`
- Variables are declared like `$name = "David"` or `$age = 35`
- To print code -- to the terminal or to a webpage if included in an html tag -- use `echo`
- All lines should end in semicolon
- echo `"\n"` to print to a new line
- `print_r()` will print readable information about whatever variable is passed in -- such as an array.

## Concatenation:

- Use `.` to concatenate strings. `echo "\nHello " . "World!"` will print "Hello World!" to a new line

## Arrays:

- arrays are declared similarly to variables: `$myArray = [1, 1, 2, 3, 5, 8, 13]`
- arrays are zero-indexed, so indices in array are accessed similarly to js: `echo $myArray[2]` will print 2.

### Array methods:

- `count($array)`: using count will display the length of the array. `echo count($myArray)` will print 7
- `reset($array)`: reset resets the internal iteration pointer to the first index and returns the first index -- this means that it will print `1` and any iteration that would have been going over `$myArray` will be set back to 0.
- `array_push($array, item)`: adds item to the end of the array. `array_push($myArray, 21)` will add 21 to the end of \$myArray.
- `array_pop($array)`: removes the last item from the array. `array_pop($myArray)` will remove the newly added 21.
- Likewise, `array_shift($myArray)` will remove the first item, and `array_unshift($myArray, item)` will add `item` to the beginning of the array.

### More Array Methods!:

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

### Additional array methods with keys/values

- `array_key_exists(keyName, $array)` lets you check if keyName is in the array:

```
if (array_key_exists("Alex", $phone_numbers)) {
    echo "Alex's phone number is " . $phone_numbers["Alex"] . "\n";
} else {
    echo "Alex's phone number is not in the phone book!";
}
```

- `array_keys($array)` and `array_values($array)` will return all the keys or values from the array in their own indexed array.

## Strings

- Variables can contain strings as their value, as seen above.
- `$greeting = "Hello"`, `$name = "David"` -- these can be concatenated together also with `.`

### String Methods

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
