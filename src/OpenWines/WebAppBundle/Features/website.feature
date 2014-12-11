Feature: website
  In order to understand this project
  As an anonymous website user
  I need to be able to use the website

  Scenario: Found a menu to use the website
    Given I am on "/index.html"
    Then the response status code should be 200
    And I should see "vignobles"

  Scenario: Found a vineyard list
    Given I am on "/vignobles"
    Then the response status code should be 200
    And I should see "Jura"

  Scenario: Found any single vineyard
    Given I am on "/vignobles/13"
    Then the response status code should be 200
    And I should see "Loire"
    And I should see "Appellation"
    And I should see "grand terroir"
    And I should see "crémant de Loire"

  Scenario: Found an Appellations list for a vineyard
    Given I am on "/vignobles/13/appellations"
    Then the response status code should be 200
    And I should see "Loire"
    And I should see "Appellation"
    And I should see "crémant de Loire"

  Scenario: Found a single Appellation in a vineyard
    Given I am on "/vignobles/13/appellations/7"
    Then the response status code should be 200
    And I should see "Loire"
    And I should see "Appellation"
    And I should see "crémant de Loire"
