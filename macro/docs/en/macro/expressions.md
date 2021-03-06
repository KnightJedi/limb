# Expressions. How to render variable values in templates
## Expressions syntax
**Expressions** — are special entities of macro template that have two main functions:

1. **to render variables** (in such cases expressions are called *output expressions*):
  * {$percentage} — renders a variable from local data scope. Same as <?php echo $percentage; ?>
  * {$#percentage} — renders a variable from global (class) data scope ( renders attribute of the class). The same as <?php echo $this→percantage; ?>
  * {$item.title} — renders a variable extracted with dotted path. Same as <?php $var_001 = isset($item['title']) ? $item['title'] : »»; echo $var_001; ?>
2. **as a part of macro tag attribute value**
  * {{input id=«title_{$index}»}} - so called «composite attribute value».

You can also apply one or several filters (other name is «formatters») to modify expression value or apply some special formatting.

Expression has the following syntax: {$Expression[|filter1|filterN]}

* {$…} — sign of expression.
* Expression — variable name or dotted path.
* filter1, filterN — applied filters. Filters are separated with vertical line.

[See more about filters](./filters_intro.md).

## Dotted expressions
Expressions like {$item.title} — we call «dotted expressions». Dotted path to may have several elements separated with dots. macro splits such expressions into components and generates approximately the following code for each component:

    if((is_array($sub_var1) || $sub_var1 instanceof ArrayAccess) && isset($sub_var1[$stepN])) 
      $sub_var2 = $sub_var1[$step2]; 
    else 
      $sub_var2 = "";

$sub_varN — is a temporary variable, and $stepN — one of the elements of the path. This means that all items before the final element should be arrays or support ArrayAccess interface. If an expression can't proceed any deeper into path, an empty string will be used as expression value.

## Expressions with method calls
Expressions also support method calling and accessing object attributes directly. Just use an arrow symbol as the follows:

    {$#some_object->someMethod()}
    {$#some_object->attr1}

You can pass any arguments into method:

    {$#some_object->someMethod("aaa", $#foo)}

You can continue dotted expression after method call, for example:

    {$#book->getAuthor().full_name}

The last example will be compiled into something like this:

    $temp_var = $this->book->getAuthor();
    if((is_array($temp_var) || $temp_var instanceof ArrayAccess) && isset($temp_var['full_name'])) 
      $sub_var = temp_var['full_name']; 
    else 
      $sub_var = "";

## When {{macro}} applies default HTML filter to output expressions
You should know that macro **applies HTML filter** (an alias for htmlspecialchars()) **to all output expressions without other filters**. If you don't want this behavior for some particular expression you can use **raw** filter which cancels HTML filter.

Here are some usage examples:

* {$title} — HTML filter will be applied
* {$title|raw} — HTML filter will no be applied since raw filter is used
* {$title|html} — HTML filter will be applied since used explicitly
* {$title|trim} — HTML filter will not be applied since other filters are used
* {$title|trim|html} — HTML filter will be applied since used explicitly
