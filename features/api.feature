Feature: api
  In order to consume the API
  As an anonymous API user
  I need to be able to fetch data using the API


  Scenario: index as HATEOAS
    Given I am on "/index.json"
    Then the response status code should be 200
    And the response should contain "Champagne"

  Scenario: Searching for a page that does exist
    Given I am on "/regions.json"
    Then the response status code should be 200
    And the response should contain "Champagne"
