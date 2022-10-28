<?php

declare(strict_types=1);

namespace Polimiacre\Borsericerca\Controller;


/**
 * This file is part of the "borsericerca" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 
 */

/**
 * BorsericercaController
 */
class BorsericercaController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * borsericercaRepository
     *
     * @var \Polimiacre\Borsericerca\Domain\Repository\BorsericercaRepository
     */
    protected $borsericercaRepository = null;

    /**
     * @param \Polimiacre\Borsericerca\Domain\Repository\BorsericercaRepository $borsericercaRepository
     */
    public function injectBorsericercaRepository(\Polimiacre\Borsericerca\Domain\Repository\BorsericercaRepository $borsericercaRepository)
    {
        $this->borsericercaRepository = $borsericercaRepository;
    }

    /**
     * action list
     *
     * @return string|object|null|void
     */
    public function listAction()
    {
        $borsericercas = $this->borsericercaRepository->findAll();
        $this->view->assign('borsericercas', $borsericercas);
    }

    /**
     * action show
     *
     * @param \Polimiacre\Borsericerca\Domain\Model\Borsericerca $borsericerca
     * @return string|object|null|void
     */
    public function showAction(\Polimiacre\Borsericerca\Domain\Model\Borsericerca $borsericerca)
    {
        $this->view->assign('borsericerca', $borsericerca);
    }
}
