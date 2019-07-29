<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Laravel\Dusk\Chrome;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://aurora.umanitoba.ca/banprod/twbkwbis.P_GenMenu?name=homepage')
                        ->assertTitle('homepage');

            $browser->clickLink('Course Catalog')
                        ->assertTitle('Catalog Term');

            // Winter2020
            $browser->select('cat_term_in', '202010');
            $browser->press('Submit')
                        ->assertTitle('Catalog Search');
            
            $browser->assertSee('Computer Science');
            $browser->select('sel_subj', 'COMP');
            $browser->press('Get Courses')
                        ->assertTitle('Catalog Entries');

            $tds = $browser->elements('table tr .nttitle');
            $linkTexts = Array();
            foreach ($tds as $td)
            {
                $linkText = $td->getText();
                array_push($linkTexts, $linkText);
                Log::info($linkText);
            }
            $browser->refresh();
            $browser->clickLink($linkTexts[0])->assertTitle('Detailed Course Information');
            dd($linkTexts);
            // foreach ($linkTexts as $linkText)
            // {
                
            // }
        });
    }
}
