<?php
/**
* @version 1.0.0 stable - Joomla 6 Compatible
* @package Joomla
* @copyright (C) 2018 Berges Yannick - www.com3elles.com
* @license GNU/GPL v2
*
* Updated for Joomla 6 compatibility with Subform support
* special thanks to my master Marc Studer
* Elisa Foltyn coolcat-creations
*
* JOOMLA admin module by Com3elles is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
**/

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Form\FormField;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\Registry\Registry;

// Charger les assets CSS
HTMLHelper::_('stylesheet', 'media/mod_flexiadmin/css/admin-style.css');

class JFormFieldIconpicker extends FormField
{
    protected $type = 'Iconpicker';
    protected static $initialised = false;

    /**
     * Méthode pour obtenir le champ input
     *
     * @return string Le HTML du champ
     */
    public function getInput()
    {
        // Charger les assets une seule fois
        if (!self::$initialised) {
            $this->loadAssets();
            self::$initialised = true;
        }

        // Générer un ID unique pour ce champ
        $fieldId = $this->id;
        $fieldName = $this->name;
        $fieldValue = htmlspecialchars($this->value, ENT_QUOTES, 'UTF-8');

        // Générer l'HTML du bouton
        $html = '<div class="iconpicker-container" data-iconpicker-field="' . $fieldId . '">';
        $html .= '<button type="button" id="' . $fieldId . '-wrapper" class="btn btn-secondary iconpicker-button" data-iconpicker-id="' . $fieldId . '"></button>';
        $html .= '</div>';
        
        // Script d'initialisation pour ce champ spécifique
        $html .= $this->getFieldScript($fieldId, $fieldName, $fieldValue);

        return $html;
    }

    /**
     * Charger les assets (scripts et styles)
     */
    protected function loadAssets()
    {
        $wa = Factory::getApplication()->getDocument()->getWebAssetManager();
        
        // Charger jQuery si pas déjà chargé
        $wa->useScript('jquery');

        // Récupérer les paramètres du module
        $module = ModuleHelper::getModule('mod_flexiadmin');
        $moduleParams = new Registry();
        
        if ($module) {
            $moduleParams->loadString($module->params);
        }
        
        // Option pour utiliser CDN (par défaut à 1)
        $useCDN = $moduleParams->get('usecdn', '1');

        if ($useCDN == 1) {
            // Charger depuis CDN
            $wa->registerAndUseStyle(
                'fontawesome',
                'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
                [],
                ['defer' => true]
            );
            
            $wa->registerAndUseStyle(
                'bootstrap-iconpicker',
                'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/css/bootstrap-iconpicker.min.css'
            );
            
            $wa->registerAndUseScript(
                'bootstrap-iconpicker-iconset',
                'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/iconset/iconset-all.min.js',
                [],
                ['defer' => true],
                ['jquery']
            );
            
            $wa->registerAndUseScript(
                'bootstrap-iconpicker',
                'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker.bundle.min.js',
                [],
                ['defer' => true],
                ['jquery', 'bootstrap-iconpicker-iconset']
            );
        } else {
            // Charger depuis les fichiers locaux
            $wa->registerAndUseStyle(
                'bootstrap-iconpicker',
                'media/mod_flexiadmin/css/bootstrap-iconpicker.min.css'
            );
            
            $wa->registerAndUseScript(
                'bootstrap-iconpicker-iconset',
                'media/mod_flexiadmin/js/bootstrap-iconpicker-iconset-all.min.js',
                [],
                ['defer' => true],
                ['jquery']
            );
            
            $wa->registerAndUseScript(
                'bootstrap-iconpicker',
                'media/mod_flexiadmin/js/bootstrap-iconpicker.min.js',
                [],
                ['defer' => true],
                ['jquery', 'bootstrap-iconpicker-iconset']
            );
        }

        // Ajouter le script global pour gérer les subforms
        $this->addGlobalScript();
    }

    /**
     * Script global pour gérer l'initialisation et les événements subform
     */
    protected function addGlobalScript()
    {
        $doc = Factory::getApplication()->getDocument();
        
        $script = "
        (function($) {
            'use strict';
            
            // Configuration globale de l'iconpicker
            var iconpickerConfig = {
                align: 'left',
                arrowClass: 'btn-success',
                arrowPrevIconClass: 'fas fa-arrow-left',
                arrowNextIconClass: 'fas fa-arrow-right',
                cols: 5,
                rows: 5,
                footer: true,
                header: true,
                iconset: 'fontawesome5',
                labelHeader: '" . Text::sprintf('FLEXI_ADMIN_ICONLINK_PAGESINDEX', '{0}', '{1}') . "',
                labelFooter: '" . Text::sprintf('FLEXI_ADMIN_ICONLINK_ICONSINDEX', '{0}', '{1}', '{2}') . "',
                placement: 'bottom',
                search: true,
                searchText: '" . Text::_('FLEXI_ADMIN_ICONLINK_SEARCHTEXT') . "',
                selectedClass: 'btn-primary',
                unselectedClass: 'btn-secondary'
            };
            
            // Fonction pour initialiser un iconpicker
            window.initIconpicker = function(buttonElement) {
                var \$button = $(buttonElement);
                var fieldId = \$button.data('iconpicker-id');
                
                // Ne pas réinitialiser si déjà initialisé
                if (\$button.data('iconpicker-initialized')) {
                    return;
                }
                
                var \$container = \$button.closest('.iconpicker-container');
                var \$input = \$container.find('input[id=\"' + fieldId + '\"]');
                
                // Si l'input n'existe pas encore, le créer
                if (\$input.length === 0) {
                    return;
                }
                
                var currentIcon = \$input.val() || '';
                
                // Configuration spécifique avec l'icône actuelle
                var config = $.extend({}, iconpickerConfig, {
                    icon: currentIcon
                });
                
                // Initialiser l'iconpicker
                \$button.iconpicker(config);
                
                // Marquer comme initialisé
                \$button.data('iconpicker-initialized', true);
                
                // Gérer le changement d'icône
                \$button.on('change', function(e) {
                    if (e.icon) {
                        \$input.val(e.icon);
                        \$input.trigger('change');
                    }
                });
            };
            
            // Fonction pour initialiser tous les iconpickers
            window.initAllIconpickers = function(context) {
                var \$context = context ? $(context) : $(document);
                \$context.find('.iconpicker-button').each(function() {
                    window.initIconpicker(this);
                });
            };
            
            // Initialisation au chargement du DOM
            $(document).ready(function() {
                window.initAllIconpickers();
                
                // Observer les événements subform-row-add pour les nouveaux champs
                $(document).on('subform-row-add', function(event, row) {
                    setTimeout(function() {
                        window.initAllIconpickers(row);
                    }, 100);
                });
                
                // Nettoyer les iconpickers lors de la suppression de lignes
                $(document).on('subform-row-remove', function(event, row) {
                    $(row).find('.iconpicker-button').each(function() {
                        var \$button = $(this);
                        if (\$button.data('iconpicker')) {
                            \$button.iconpicker('destroy');
                        }
                    });
                });
            });
            
        })(jQuery);
        ";
        
        $doc->addScriptDeclaration($script);
    }

    /**
     * Générer le script d'initialisation pour un champ spécifique
     */
    protected function getFieldScript($fieldId, $fieldName, $fieldValue)
    {
        return "
        <script>
        (function($) {
            $(document).ready(function() {
                // Attendre que l'input soit créé par Joomla
                var checkInput = setInterval(function() {
                    var \$container = $('[data-iconpicker-field=\"{$fieldId}\"]');
                    var \$input = \$container.find('input');
                    
                    if (\$input.length === 0) {
                        // Créer l'input hidden si pas encore créé
                        var \$button = $('#{$fieldId}-wrapper');
                        var input = '<input type=\"hidden\" id=\"{$fieldId}\" name=\"{$fieldName}\" value=\"{$fieldValue}\" />';
                        \$button.after(input);
                        \$input = \$container.find('input');
                    }
                    
                    if (\$input.length > 0) {
                        clearInterval(checkInput);
                        
                        // S'assurer que l'input a les bons attributs
                        \$input.attr({
                            'id': '{$fieldId}',
                            'name': '{$fieldName}'
                        });
                        
                        if (\$input.val() === '') {
                            \$input.val('{$fieldValue}');
                        }
                        
                        // Initialiser l'iconpicker
                        var \$button = $('#{$fieldId}-wrapper');
                        if (typeof window.initIconpicker === 'function') {
                            window.initIconpicker(\$button[0]);
                        }
                    }
                }, 50);
                
                // Timeout de sécurité
                setTimeout(function() {
                    clearInterval(checkInput);
                }, 3000);
            });
        })(jQuery);
        </script>
        ";
    }
}