Case Study: Interface Segregation Principle (ISP)
=================================================

Overview
--------

This case study explores the implementation of the Interface Segregation Principle (ISP) in a PHP application. ISP, one of the five SOLID design principles, states that no client should be forced to depend on methods it does not use. This principle encourages the creation of more specific and focused interfaces, which leads to a more modular and maintainable codebase.

Problem Statement
-----------------

The original codebase had an OrderableContract interface and an OrderManagerService class that violated ISP:

*   The OrderableContract interface contained methods that were not relevant to all clients, leading to unnecessary dependencies.
    
*   The OrderManagerService class implemented all the methods of OrderableContract, including shipping and delivery, even when these methods were not needed, resulting in a bloated and less cohesive class.
    

This design violated ISP because it forced classes to implement methods they did not need, making the code harder to maintain and understand.

Refactoring Process
-------------------

To comply with ISP, we refactored the OrderableContract by removing the unnecessary shipping and delivery methods. The OrderManagerService class was removed entirely, as it no longer served a meaningful purpose after the interface was streamlined.

*  [Original implementation](https://github.com/thiiagoms/interface-segregation-principle/commit/9398ef66782d2e8297d957b88c56ad56ffabef55)
    
*  [Refactored Implementation](https://github.com/thiiagoms/interface-segregation-principle/commit/4dd671705e0b2e73596d23b357d2bb98cc1fba22)
    

Benefits of ISP
---------------

### 1\. **Modularity**

*   The code is more modular because interfaces are now focused on specific behaviors, allowing clients to depend only on what they actually use.
    

### 2\. **Maintainability**

*   The refactored interface is easier to maintain because it contains only the necessary methods, reducing the likelihood of changes affecting unrelated parts of the code.
    

### 3\. **Cohesion**

*   The application has higher cohesion as classes implement only the methods that are directly relevant to their responsibilities.
    

### 4\. **Simplicity**

*   The code is simpler and more understandable, as each interface now represents a single responsibility, and classes implementing these interfaces are more focused.
    

Use application:
----------------

```bash
$ git clone https://github.com/thiiagoms/interface-segregation-principle
$ cd interface-segregation-principle
interface-segregation-principle $ docker-compose up -d
interface-segregation-principle $ docker-compose exec app bash
thiiagoms@3812fe54ba7b:/var/www$ composer install -vvv
thiiagoms@3812fe54ba7b:/var/www$ composer tests 
```