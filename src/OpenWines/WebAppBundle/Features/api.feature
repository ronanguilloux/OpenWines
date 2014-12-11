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
    And the response should contain "Loire"

  Scenario: Found any single vineyard
    Given I am on "/vignobles/13.json"
    Then the response status code should be 200
    And the response should contain "Loire"
    And the response should contain "Appellation"
    And the response should contain "grand terroir"

  Scenario: Found an Appellations list for a vineyard
    Given I am on "/vignobles/13/appellations.json"
    Then the response status code should be 200
#    And print last response
    And the response should contain "Loire"
    And the response should contain "Appellation"
    And the response should contain "de Loire"

  Scenario: Found a single Appellation in a vineyard
    Given I am on "/vignobles/13/appellations/7.json"
    Then the response status code should be 200
    And the response should contain "Loire"
    And the response should contain "Appellation"
    And the response should contain "de Loire"
