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
    Given I am on "/vignobles/7"
    Then the response status code should be 200
    And I should see "Jura"
    And I should see "Appellations du Jura"
    And I should see "grand terroir"
    And I should see "Macvin du Jura"
    And I should see "http://www.jura-vins.com"

  Scenario: Found an Appellations list for a vineyard
    Given I am on "/vignobles/7/appellations"
    Then the response status code should be 200
    And I should see "Jura"
    And I should see "Appellations du Jura"
    And I should see "Macvin du Jura"

  Scenario: Found a single Appellation in a vineyard
    Given I am on "/vignobles/7/appellations/6"
    Then the response status code should be 200
    And I should see "Jura"
    And I should see "Appellations du Jura"
    And I should see "Macvin du Jura"
    And I should see "http://www.jura-vins.com/appellation-macvin-du-jura.htm"
