<?php
/**
 * Class FreshBooksViewableData
 *
 * This class (and it's sub-classes) wrap around {@link ViewableData}, without saving any data to the database. This is
 * done to ensure we don't duplicate information in FreshBooks within the local SilverStripe data model.
 *
 * The {@link ViewableData::$casting} array should be declared to cast all values to equivalent field types, for use
 * within SilverStripe templates.
 */
class FreshBooksViewableData extends ViewableData {

}