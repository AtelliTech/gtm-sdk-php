<?php

namespace gtm;

/**
 * class Type
 *
 * @author Edward Ai <edward.ai@adgeek.com.tw>
 * @since 1.0.0
 * @version 1.0.0
 */
class Type
{
    /**
     * @const string BOOLEAN
     */
    public const BOOLEAN = 'boolean';

    /**
     * @const string INTEGER
     */
    public const INTEGER = 'integer';

    /**
     * @const string LIST
     */
    public const LIST = 'list';

    /**
     * @const string MAP
     */
    public const MAP = 'map';

    /**
     * @const string TAG_REFERENCE
     */
    public const TAG_REFERENCE = 'tagReference';

    /**
     * @const string TEMPLATE
     */
    public const TEMPLATE = 'template';

    /**
     * @const string TRIGGER_REFERENCE
     */
    public const TRIGGER_REFERENCE = 'triggerReference';

    /**
     * @const string TYPE_UNSPECIFIED
     */
    public const TYPE_UNSPECIFIED = 'typeUnspecified';

    /**
     * @var string GTM Parameter key = javascript.
     */
    public const PARAM_KEY_JS = 'javascript';

    /**
     * @var string GTM Variable type = jsm (Custom JavaScript).
     */
    public const VAR_TYPE = 'jsm';
}
