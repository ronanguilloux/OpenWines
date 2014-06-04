Feature: api
  In order to consume the API
  As an anonymous API user
  I need to be able to fetch data using the API


  Scenario: index as HATEOAS
    Given I am on "/index.json"
    Then the response status code should be 200
    And the response should contain "vignobles"

  Scenario: Searching for vineyards that does exist
    Given I am on "/vignobles.json"
    Then the response status code should be 200
    And the response should contain "Jura"

  Scenario: Looking for a single vineyard
    Given I am on "/vignobles/7.json"
    Then the response status code should be 200
    And the response should contain "grand terroir"

  Scenario: Looking for a single AOC
    Given I am on "/vignobles/7/aocs.json"
    Then the response status code should be 200
    And the response should contain "Macvin"
