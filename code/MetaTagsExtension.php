<?php

class MetaTagsExtension extends DataExtension {

    private static $db = array(
        'MetaTitle' => 'Varchar(70)',
    );

    public function updateCMSFields(FieldList $fields) {
        $metaData = $fields->fieldByName('Root.Main.Metadata');

        $metaFieldTitle = new TextField("MetaTitle", $this->owner->fieldLabel('MetaTitle'));
        $metaFieldTitle->setRightTitle(_t(
            'SiteTree.METATITLEHELP',
            'Shown at the top of the browser window and used as the "linked text" by search engines.'
        ))->addExtraClass('help');

        $metaData->insertBefore($metaFieldTitle, 'MetaDescription');

        return $fields;
    }

    public function updateFieldLabels(&$labels) {
        $labels['MetaTitle'] = _t('SiteTree.METATITLE', "Title");
    }

}