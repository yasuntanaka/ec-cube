<?php
/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) 2000-2017 LOCKON CO.,LTD. All Rights Reserved.
 *
 * http://www.lockon.co.jp/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

namespace Page\Front;


class CustomerAddressListPage extends AbstractFrontPage
{
    public function __construct(\AcceptanceTester $I)
    {
        parent::__construct($I);
    }

    public static function at($I)
    {
        $page = new self($I);
        $page->tester->see('マイページ/お届け先一覧', 'div.ec-pageHeader h1');
        return $page;
    }

    public function 追加()
    {
        $this->tester->click('div.ec-addressRole div.ec-addressRole__actions a');
        return new CustomerAddressEditPage($this->tester);
    }

    public function 変更($num)
    {
        $this->tester->click("div.ec-addressList div:nth-child(${num}) div.ec-addressList__action a");
        return new CustomerAddressEditPage($this->tester);
    }

    public function 削除($num)
    {
        $this->tester->click("div.ec-addressList div:nth-child(${num}) a.ec-addressList__remove");
        $this->tester->acceptPopup();
        return $this;
    }
}