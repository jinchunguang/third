```
class Calendar
{

    /**
     * 当前时间
     * @param string $style
     * @return false|string
     */
    public static function currentTime(string $style = "Y-m-d")
    {
        return date($style, time());
    }

    /**
     * x小时前
     * @param string $x
     * @param string $style
     * @return false|string
     */
    public static function xHourAgo(string $x, string $style = "Y-m-d")
    {
        return date($style, strtotime("{$x} hour"));
    }

    /**
     * x天前
     * @param string $x
     * @param string $style
     * @return false|string
     */
    public static function xDayAgo(string $x, string $style = "Y-m-d")
    {
        return date($style, strtotime("{$x} day"));
    }

    /**
     * x月前
     * @param string $x
     * @param string $style
     * @return false|string
     */
    public static function xMonthAgo(string $x, string $style = "Y-m-d")
    {
        return date($style, strtotime("{$x} month"));
    }

    /**
     * x年前
     * @param string $x
     * @param string $style
     * @return false|string
     */
    public static function xYearAgo(string $x, string $style = "Y-m-d")
    {
        return date($style, strtotime("{$x} year"));
    }
}
```
