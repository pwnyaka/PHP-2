<?php


namespace app\engine;


use app\interfaces\IRenderer;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigRenderer implements IRenderer
{
    private $loader;
    private $twig;

    public function __construct(string $path)
    {
        $this->loader = new FilesystemLoader($path);
        $this->twig = new Environment($this->loader);
    }

    public function renderTemplate($template, $params = [])
    {
        return $this->twig->render($template . '.twig', $params);
    }
}