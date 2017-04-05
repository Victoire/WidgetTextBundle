@mink:selenium2 @alice(Page) @reset-schema
Feature: Manage a Plain Text widget

    Background:
        Given I am on homepage

    Scenario: I can create a new Plain Text widget
        When I switch to "layout" mode
        Then I should see "New content"
        When I select "Plain Text" from the "1" select of "main_content" slot
        Then I should see "Widget (Plain Text)"
        And I should see "1" quantum
        When I fill in "_a_static_widget_text[content]" with "My Plain Text Widget content"
        And I submit the widget
        Then I should see the success message for Widget edit
        When I reload the page
        Then I should see "My Plain Text Widget content"

    Scenario: I can update a Plain Text widget
        Given the following WidgetMap:
            | view | action | slot         |
            | home | create | main_content |
        And the following WidgetText:
            | widgetMap | content                   |
            | home      | Plain Text Widget to edit |
        When I reload the page
        Then I should see "Plain Text Widget to edit"
        When I switch to "edit" mode
        And I edit the "Text" widget
        And I should see "1" quantum
        When I fill in "_a_static_widget_text[content]" with "Plain Text Widget modified"
        And I submit the widget
        Then I should see the success message for Widget edit
        When I reload the page
        Then I should see "Plain Text Widget modified"
