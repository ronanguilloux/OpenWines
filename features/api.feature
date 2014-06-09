Feature: api
  In order to consume the API
  As an anonymous API user
  I need to be able to fetch data using the API


  Scenario: index as HATEOAS
    Given I am on "/index.json"
    Then the response status code should be 200
    And the response should contain "vignobles"

  Scenario: Found a vineyard list
    Given I am on "/vignobles.json"
    Then the response status code should be 200
    And the response should contain "Jura"

  Scenario: Found any single vineyard
    Given I am on "/vignobles/7.json"
    Then the response status code should be 200
    And the response should contain "grand terroir"

  Scenario: Found an AOCs list for a vineyard
    Given I am on "/vignobles/7/aocs.json"
    Then the response status code should be 200
    And the response should contain "Macvin"
    And the response should contain "produit"

  Scenario: Found a single AOC in a vineyard
    Given I am on "/vignobles/7/aocs/6.json"
    Then the response status code should be 200
    And the response should contain "Macvin"
    And the response should contain "aoc"
    And the response should contain "produit"
