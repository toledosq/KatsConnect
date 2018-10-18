<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/18/2018
 * Time: 1:20 PM
 */

class campusDirect {
    private $menuBar;
    private $academicCalendar;
    private $katSafe;
    private $campusMap;

    public function getMenuBar()
    {
        return $this->menuBar;
    }

    public function getAcademicCalendar()
    {
        return $this->academicCalendar;
    }

    public function getCampusMap()
    {
        return $this->campusMap;
    }


    public function getKatSafe()
    {
        return $this->katSafe;
    }

    public function setAcademicCalendar($academicCalendar)
    {
        $this->academicCalendar = $academicCalendar;
    }

    public function setCampusMap($campusMap)
    {
        $this->campusMap = $campusMap;
    }

    public function setKatSafe($katSafe)
    {
        $this->katSafe = $katSafe;
    }

    public function setMenuBar($menuBar)
    {
        $this->menuBar = $menuBar;
    }
}

class KatSafe {
    private $alert;

    public function getAlert()
    {
        // Called by page to retrieve current alert
        $this->fetchAlert();
        return $this->alert;
    }

    public function setAlert($alert)
    {
        $this->alert = $alert;
    }

    public function fetchAlert()
    {
        // Could use curl or whatever php's equiv is to send GET rqst for the HTML element containing katsafe info
        $alert = NAN;
        $this->setAlert($alert);
    }

}

class Calendar {
    private $dates = array(array());

    public function getDates()
    {
        $this->fetchCalendarInfo();
        return $this->dates;
    }

    public function setDates($dates)
    {
        $this->dates = $dates;
    }

    public function fetchCalendarInfo()
    {
        // Again, use curl or something to GET calendar info (maybe POST if its a lot of stuff)
        $dates = array(array());
        $this->setDates($dates);
    }
}

class CampusMap {
    private $campusMap;

    public function setCampusMap($campusMap)
    {
        $this->campusMap = $campusMap;
    }

    public function getCampusMap()
    {
        return $this->campusMap;
    }
}