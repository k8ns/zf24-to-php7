<?php
namespace Zend\Db\ResultSet {
    function count($a, $b = COUNT_NORMAL) {
        return override_count($a, $b);
    }
}

namespace Zend\Db\Sql {
    function count($a, $b = COUNT_NORMAL) {
        return override_count($a, $b);
    }
}

namespace Zend\Validator {
    function idn_to_utf8($domain) {
        return override_idn_to_utf8($domain);
    }

    function idn_to_ascii($domain) {
        return override_idn_to_ascii($domain);
    }
}

namespace {
    function override_count($a, $b = COUNT_NORMAL) {
        if (is_array($a) || $a instanceof Countable) {
            return count($a, $b);
        } else {
            return 1;
        }
    }

    function override_idn_to_utf8($domain, $options = 0, $variant = INTL_IDNA_VARIANT_UTS46) {
        return idn_to_utf8($domain, $options, $variant);
    }

    function override_idn_to_ascii($domain, $options = 0, $variant = INTL_IDNA_VARIANT_UTS46) {
        return idn_to_ascii($domain, $options, $variant);
    }
}
