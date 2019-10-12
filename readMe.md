# Learning PHP - My Notes

---

## Basic Language Syntax:

- PHP is often included directly in HTML files, and declared with a php tag like `<?php ...your code here ?>`
- Variables are declared like `?name = "David"` or `?age = 35`
- To print code -- to the terminal or to a webpage if included in an html tag -- use `echo`
- All lines should end in semicolon
- echo `"\n"` to print to a new line
- `print_r()` will print readable information about whatever variable is passed in -- such as an array.

## Concatenation:
- Use `.` to concatenate strings. `echo "\nHello " . "World!"` will print "Hello World!" to a new line

## Arrays:

- arrays are declared similarly to variables: `$myArray = [1, 1, 2, 3, 5, 8, 13]`
- arrays are zero-indexed, so indices in array are accessed similarly to js: `echo $myArray[2]` will print 2.

## Array methods:
- `count($array)`: using count will display the length of the array.  `echo count($myArray)` will print 7
- `reset($array)`: reset resets the internal iteration pointer to the first index and returns the first index -- this means that it will print `1` and any iteration that would have been going over `$myArray` will be set back to 0.
- `array_push($array, item)`: adds item to the end of the array.  `array_push($myArray, 21)` will add 21 to the end of $myArray.
- `array_pop($array)`: removes the last item from the array.  `array_pop($myArray)` will remove the newly added 21.
- Likewise, `array_shift($myArray)` will remove the first item, and `array_unshift($myArray, item)` will add `item` to the beginning of the array.

### More Array Methods!:
- `array_merge($array, $array)` will concatenate the two arrays together
- 
