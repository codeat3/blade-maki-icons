<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Config;
use BladeUI\Icons\BladeIconsServiceProvider;
use Codeat3\BladeMakiIcons\BladeMakiIconsServiceProvider;

class CompilesIconsTest extends TestCase
{
    /** @test */
    public function it_compiles_a_single_anonymous_component()
    {
        $result = svg('maki-village')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" fill="currentColor"><path d="M6.176,4.176a.249.249,0,0,0-.352,0l-4.4,4.4A.25.25,0,0,0,1.6,9H3v4.751A.249.249,0,0,0,3.249,14h3.5A.249.249,0,0,0,7,13.753H7V8.323a.249.249,0,0,1,.073-.176L8.5,6.5ZM6,12H5V11H6Zm0-2H5V9H6Zm6.75-4h-.5a.25.25,0,0,0-.25.25V8L10.676,6.176a.249.249,0,0,0-.352,0L8.056,8.932A.246.246,0,0,0,8,9.088v4.66A.249.249,0,0,0,8.246,14h1.5A.253.253,0,0,0,10,13.748h0V12h1v1.747a.253.253,0,0,0,.253.253h1.5A.25.25,0,0,0,13,13.751V6.25A.25.25,0,0,0,12.75,6ZM10,11H9V10h1Zm2,0H11V10h1Z"/></svg>
            SVG;


        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('maki-village', 'w-6 h-6 text-gray-500')->toHtml();
        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" fill="currentColor"><path d="M6.176,4.176a.249.249,0,0,0-.352,0l-4.4,4.4A.25.25,0,0,0,1.6,9H3v4.751A.249.249,0,0,0,3.249,14h3.5A.249.249,0,0,0,7,13.753H7V8.323a.249.249,0,0,1,.073-.176L8.5,6.5ZM6,12H5V11H6Zm0-2H5V9H6Zm6.75-4h-.5a.25.25,0,0,0-.25.25V8L10.676,6.176a.249.249,0,0,0-.352,0L8.056,8.932A.246.246,0,0,0,8,9.088v4.66A.249.249,0,0,0,8.246,14h1.5A.253.253,0,0,0,10,13.748h0V12h1v1.747a.253.253,0,0,0,.253.253h1.5A.25.25,0,0,0,13,13.751V6.25A.25.25,0,0,0,12.75,6ZM10,11H9V10h1Zm2,0H11V10h1Z"/></svg>
            SVG;
        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('maki-village', ['style' => 'color: #555'])->toHtml();


        $expected = <<<'SVG'
            <svg style="color: #555" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" fill="currentColor"><path d="M6.176,4.176a.249.249,0,0,0-.352,0l-4.4,4.4A.25.25,0,0,0,1.6,9H3v4.751A.249.249,0,0,0,3.249,14h3.5A.249.249,0,0,0,7,13.753H7V8.323a.249.249,0,0,1,.073-.176L8.5,6.5ZM6,12H5V11H6Zm0-2H5V9H6Zm6.75-4h-.5a.25.25,0,0,0-.25.25V8L10.676,6.176a.249.249,0,0,0-.352,0L8.056,8.932A.246.246,0,0,0,8,9.088v4.66A.249.249,0,0,0,8.246,14h1.5A.253.253,0,0,0,10,13.748h0V12h1v1.747a.253.253,0,0,0,.253.253h1.5A.25.25,0,0,0,13,13.751V6.25A.25.25,0,0,0,12.75,6ZM10,11H9V10h1Zm2,0H11V10h1Z"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_default_class_from_config()
    {
        Config::set('blade-maki-icons.class', 'awesome');

        $result = svg('maki-village')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" fill="currentColor"><path d="M6.176,4.176a.249.249,0,0,0-.352,0l-4.4,4.4A.25.25,0,0,0,1.6,9H3v4.751A.249.249,0,0,0,3.249,14h3.5A.249.249,0,0,0,7,13.753H7V8.323a.249.249,0,0,1,.073-.176L8.5,6.5ZM6,12H5V11H6Zm0-2H5V9H6Zm6.75-4h-.5a.25.25,0,0,0-.25.25V8L10.676,6.176a.249.249,0,0,0-.352,0L8.056,8.932A.246.246,0,0,0,8,9.088v4.66A.249.249,0,0,0,8.246,14h1.5A.253.253,0,0,0,10,13.748h0V12h1v1.747a.253.253,0,0,0,.253.253h1.5A.25.25,0,0,0,13,13.751V6.25A.25.25,0,0,0,12.75,6ZM10,11H9V10h1Zm2,0H11V10h1Z"/></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    /** @test */
    public function it_can_merge_default_class_from_config()
    {
        Config::set('blade-maki-icons.class', 'awesome');

        $result = svg('maki-village', 'w-6 h-6')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" fill="currentColor"><path d="M6.176,4.176a.249.249,0,0,0-.352,0l-4.4,4.4A.25.25,0,0,0,1.6,9H3v4.751A.249.249,0,0,0,3.249,14h3.5A.249.249,0,0,0,7,13.753H7V8.323a.249.249,0,0,1,.073-.176L8.5,6.5ZM6,12H5V11H6Zm0-2H5V9H6Zm6.75-4h-.5a.25.25,0,0,0-.25.25V8L10.676,6.176a.249.249,0,0,0-.352,0L8.056,8.932A.246.246,0,0,0,8,9.088v4.66A.249.249,0,0,0,8.246,14h1.5A.253.253,0,0,0,10,13.748h0V12h1v1.747a.253.253,0,0,0,.253.253h1.5A.25.25,0,0,0,13,13.751V6.25A.25.25,0,0,0,12.75,6ZM10,11H9V10h1Zm2,0H11V10h1Z"/></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    protected function getPackageProviders($app)
    {
        return [
            BladeIconsServiceProvider::class,
            BladeMakiIconsServiceProvider::class,
        ];
    }
}
