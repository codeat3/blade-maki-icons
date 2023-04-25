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
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" fill="currentColor"><path d="M6.176 1.176a.249.249 0 0 0-.352 0l-4.4 4.4A.25.25 0 0 0 1.6 6H3v6.751a.25.25 0 0 0 .249.249h3.5A.248.248 0 0 0 7 12.753v-7.43c0-.066.026-.13.073-.176L8.5 3.5 6.176 1.176ZM6 11H5v-1h1v1Zm0-2H5V8h1v1Zm0-3v1H5V6h1Z M12.75 3h-.5a.25.25 0 0 0-.25.25V5l-1.324-1.824a.249.249 0 0 0-.352 0L8.056 5.932A.246.246 0 0 0 8 6.088v6.66a.249.249 0 0 0 .246.252h1.5a.253.253 0 0 0 .254-.252V11h1v1.747a.253.253 0 0 0 .253.253h1.5a.25.25 0 0 0 .247-.249V3.25a.25.25 0 0 0-.25-.25ZM10 8H9V7h1v1Zm2 0h-1V7h1v1Zm-2 2H9V9h1v1Zm2 0h-1V9h1v1Z"/></svg>
            SVG;


        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('maki-village', 'w-6 h-6 text-gray-500')->toHtml();
        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" fill="currentColor"><path d="M6.176 1.176a.249.249 0 0 0-.352 0l-4.4 4.4A.25.25 0 0 0 1.6 6H3v6.751a.25.25 0 0 0 .249.249h3.5A.248.248 0 0 0 7 12.753v-7.43c0-.066.026-.13.073-.176L8.5 3.5 6.176 1.176ZM6 11H5v-1h1v1Zm0-2H5V8h1v1Zm0-3v1H5V6h1Z M12.75 3h-.5a.25.25 0 0 0-.25.25V5l-1.324-1.824a.249.249 0 0 0-.352 0L8.056 5.932A.246.246 0 0 0 8 6.088v6.66a.249.249 0 0 0 .246.252h1.5a.253.253 0 0 0 .254-.252V11h1v1.747a.253.253 0 0 0 .253.253h1.5a.25.25 0 0 0 .247-.249V3.25a.25.25 0 0 0-.25-.25ZM10 8H9V7h1v1Zm2 0h-1V7h1v1Zm-2 2H9V9h1v1Zm2 0h-1V9h1v1Z"/></svg>
            SVG;
        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('maki-village', ['style' => 'color: #555'])->toHtml();


        $expected = <<<'SVG'
            <svg style="color: #555" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" fill="currentColor"><path d="M6.176 1.176a.249.249 0 0 0-.352 0l-4.4 4.4A.25.25 0 0 0 1.6 6H3v6.751a.25.25 0 0 0 .249.249h3.5A.248.248 0 0 0 7 12.753v-7.43c0-.066.026-.13.073-.176L8.5 3.5 6.176 1.176ZM6 11H5v-1h1v1Zm0-2H5V8h1v1Zm0-3v1H5V6h1Z M12.75 3h-.5a.25.25 0 0 0-.25.25V5l-1.324-1.824a.249.249 0 0 0-.352 0L8.056 5.932A.246.246 0 0 0 8 6.088v6.66a.249.249 0 0 0 .246.252h1.5a.253.253 0 0 0 .254-.252V11h1v1.747a.253.253 0 0 0 .253.253h1.5a.25.25 0 0 0 .247-.249V3.25a.25.25 0 0 0-.25-.25ZM10 8H9V7h1v1Zm2 0h-1V7h1v1Zm-2 2H9V9h1v1Zm2 0h-1V9h1v1Z"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_default_class_from_config()
    {
        Config::set('blade-maki-icons.class', 'awesome');

        $result = svg('maki-village')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" fill="currentColor"><path d="M6.176 1.176a.249.249 0 0 0-.352 0l-4.4 4.4A.25.25 0 0 0 1.6 6H3v6.751a.25.25 0 0 0 .249.249h3.5A.248.248 0 0 0 7 12.753v-7.43c0-.066.026-.13.073-.176L8.5 3.5 6.176 1.176ZM6 11H5v-1h1v1Zm0-2H5V8h1v1Zm0-3v1H5V6h1Z M12.75 3h-.5a.25.25 0 0 0-.25.25V5l-1.324-1.824a.249.249 0 0 0-.352 0L8.056 5.932A.246.246 0 0 0 8 6.088v6.66a.249.249 0 0 0 .246.252h1.5a.253.253 0 0 0 .254-.252V11h1v1.747a.253.253 0 0 0 .253.253h1.5a.25.25 0 0 0 .247-.249V3.25a.25.25 0 0 0-.25-.25ZM10 8H9V7h1v1Zm2 0h-1V7h1v1Zm-2 2H9V9h1v1Zm2 0h-1V9h1v1Z"/></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    /** @test */
    public function it_can_merge_default_class_from_config()
    {
        Config::set('blade-maki-icons.class', 'awesome');

        $result = svg('maki-village', 'w-6 h-6')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" fill="currentColor"><path d="M6.176 1.176a.249.249 0 0 0-.352 0l-4.4 4.4A.25.25 0 0 0 1.6 6H3v6.751a.25.25 0 0 0 .249.249h3.5A.248.248 0 0 0 7 12.753v-7.43c0-.066.026-.13.073-.176L8.5 3.5 6.176 1.176ZM6 11H5v-1h1v1Zm0-2H5V8h1v1Zm0-3v1H5V6h1Z M12.75 3h-.5a.25.25 0 0 0-.25.25V5l-1.324-1.824a.249.249 0 0 0-.352 0L8.056 5.932A.246.246 0 0 0 8 6.088v6.66a.249.249 0 0 0 .246.252h1.5a.253.253 0 0 0 .254-.252V11h1v1.747a.253.253 0 0 0 .253.253h1.5a.25.25 0 0 0 .247-.249V3.25a.25.25 0 0 0-.25-.25ZM10 8H9V7h1v1Zm2 0h-1V7h1v1Zm-2 2H9V9h1v1Zm2 0h-1V9h1v1Z"/></svg>
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
