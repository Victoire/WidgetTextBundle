@mink:selenium2 @alice(Page)  @reset-schema
Feature: Create a Texte widget

    Background:
        Given I maximize the window
        And I am on homepage

    Scenario: I create a new Texte widget
    Scenario: I create a new Texte widget
        When I switch to "layout" mode
        Then I should see "Nouveau contenu"
        When I select "Texte brut" from the "1" select of "main_content" slot
        Then I should see "Créer"