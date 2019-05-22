<?php
/**
 Admin Page Framework v3.5.12 by Michael Uno
 Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
 <http://en.michaeluno.jp/admin-page-framework>
 Copyright (c) 2013-2015, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT>
 */
abstract class SeamlessDonationsAdminPageFramework_UserMeta_View extends SeamlessDonationsAdminPageFramework_UserMeta_Model {
    public function content($sContent) {
        return $sContent;
    }
    public function _replyToPrintFields($oUser) {
        $_iUserID = isset($oUser->ID) ? $oUser->ID : 0;
        $this->_setOptionArray($_iUserID);
        echo $this->_getFieldsOutput($_iUserID);
    }
    private function _getFieldsOutput($iUserID) {
        $_aOutput = array();
        $_oFieldsTable = new SeamlessDonationsAdminPageFramework_FormTable($this->oProp->aFieldTypeDefinitions, $this->_getFieldErrors(), $this->oMsg);
        $_aOutput[] = $_oFieldsTable->getFormTables($this->oForm->aConditionedSections, $this->oForm->aConditionedFields, array($this, '_replyToGetSectionHeaderOutput'), array($this, '_replyToGetFieldOutput'));
        $_sOutput = $this->oUtil->addAndApplyFilters($this, 'content_' . $this->oProp->sClassName, $this->content(implode(PHP_EOL, $_aOutput)));
        $this->oUtil->addAndDoActions($this, 'do_' . $this->oProp->sClassName, $this);
        return $_sOutput;
    }
    public function _replyToGetSectionHeaderOutput($sSectionDescription, $aSection) {
        return $this->oUtil->addAndApplyFilters($this, array('section_head_' . $this->oProp->sClassName . '_' . $aSection['section_id']), $sSectionDescription);
    }
}