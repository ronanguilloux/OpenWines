Feature: website
  In order to understand this project
  As an anonymous website user
  I need to be able to use the website

  Scenario: Found a menu to use the website
    Given I am on "/index.html"
    Then the response status code should be 200
    And I should see "vignobles"

  Scenario: Found a menu to use the website
    Given I am on "/vignobles.html"
    Then the response status code should be 200
    And I should see "Jura"

