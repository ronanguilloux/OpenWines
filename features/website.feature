Feature: website
  In order to understand this project
  As an anonymous website user
  I need to be able to view the homepage

  Scenario: Searching for a page that does exist
    Given I am on "/"
    Then I should see "openwines.org"