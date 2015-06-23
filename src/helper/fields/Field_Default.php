<?php

namespace GFPDF\Helper\Fields;

use GFPDF\Helper\Helper_Fields;
use GFFormsModel;
use Exception;

/**
 * Gravity Forms Field
 *
 * @package     Gravity PDF
 * @copyright   Copyright (c) 2015, Blue Liquid Designs
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       4.0
 */

/* Exit if accessed directly */
if (! defined('ABSPATH')) {
    exit;
}

/*
    This file is part of Gravity PDF.

    Gravity PDF Copyright (C) 2015 Blue Liquid Designs

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

/**
 * Controls the display and output of a Gravity Form field
 *
 * @since 4.0
 */
class Field_Default extends Helper_Fields
{
    /**
     * Display the HTML version of this field
     * @return String
     * @since 4.0
     */
    public function html() {
        return '<div id="field-'. $this->field->id .'" class="gfpdf-default gfpdf-field '. $this->field->cssClass . '">'
                    . '<div class="label"><strong>' . esc_html(GFFormsModel::get_label($this->field)) . '</strong></div>'
                    . '<div class="value">' . esc_html($this->value()) . '</div>'
                . '</div>';
    }

    /**
     * Get the standard GF value of this field
     * @return String/Array
     * @since 4.0
     */
    public function value() {
        if($this->has_cache()) {
            return $this->cache();
        }

        $this->cache($this->get_value());
        
        return $this->cache();
    }
}