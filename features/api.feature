Feature: website
  In order to consume the API
  As an anonymous API user
  I need to be able to fetch data using the API

  Scenario: Searching for a page that does exist
    Given I prepare a GET request on "/terroirs"
    When I send the request
    And I should receive a 200 json response
