<?php

if (!function_exists('formatAvailability')) {
    function formatAvailability($availability)
    {
        // Handle null or empty input
        if (empty($availability)) {
            return 'No availability data';
        }
        // If already array, use as is; if string, decode
        if (is_array($availability)) {
            $data = $availability;
        } elseif (is_string($availability)) {
            $availability = trim($availability);
            if ($availability === '') {
                return 'No availability data';
            }
            $data = json_decode($availability, true);
        } else {
            // Not a string or array
            return 'No availability data';
        }
        if (!$data || !is_array($data)) return 'No availability data';
        
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $formatted = '<div class="row">';
        $col1 = '';
        $col2 = '';
        
        foreach ($daysOfWeek as $index => $day) {
            if (array_key_exists($day, $data)) {
                $time = $data[$day];
                $content = '<div class="availability-day">' . $day . ':</div>';
                if ($time === 'Unavailable') {
                    $content .= '<div class="availability-unavailable">Unavailable</div>';
                } elseif ($time === 'Closed') {
                    $content .= '<div class="availability-closed">Closed</div>';
                } else {
                    $content .= '<div class="availability-time">' . $time . '</div>';
                }
                if ($index < 4) {
                    $col1 .= $content;
                } else {
                    $col2 .= $content;
                }
            }
        }
        
        $formatted .= '<div class="col-6">' . $col1 . '</div>';
        $formatted .= '<div class="col-6">' . $col2 . '</div>';
        $formatted .= '</div>';
        
        return $formatted;
    }
} 