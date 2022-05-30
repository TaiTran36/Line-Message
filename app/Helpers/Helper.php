<?php

class Helper
{
    protected $client;

    public function __construct(\GuzzleHttp\Client $client = null)
    {
        $this->client = !$client ? (new \GuzzleHttp\Client(['http_errors' => false])) : new $client;
    }

    protected function getHeader($response)
    {
        $headers = array();

        foreach ($response->getHeaders() as $header => $headerObject) {
            $allHeaderValues = $headerObject;
            $headers[$header] = $allHeaderValues[0];
        }

        return $headers;
    }

    public function get($url, $headers = ['X-Foo' => 'Bar'])
    {
        $request = $this->client->request('GET',
            $url,
            ['headers' => $headers],
            ["connect_timeout" => 300, "timeout" => 300]
        );

        $response = $request->getBody()->getContents();

        return $response;
    }

    public function post($url, $data, $headers = ['X-Foo' => 'Bar'])
    {
        $response = $this->client->request('POST', $url, ['json' => $data, 'headers' => $headers]);

        return $response->getBody()->getContents();
    }

    public function put($url, $data, $headers = ['X-Foo' => 'Bar'])
    {
        $response = $this->client->request('PUT', $url, ['form_params' => $data], ['headers' => $headers]);

        return $response;
    }

    public function delete($url)
    {
        $response = $this->client->delete($url);

        return $response;
    }

    public function response($response)
    {
        return $response;
    }

    public static function pushMessage($data)
    {
        $header = ['Content-type' => 'application/json', 'Authorization' => 'Bearer ' . env('CHANNEL_ACCESS_TOKEN')];
        $url = 'https://api.line.me/v2/bot/message/push';
        $request = (new Helper())->post($url, $data, $header);
        return $request;
    }

    public static function getProfileUserId($userId)
    {
        $header = ['Content-type' => 'application/json', 'Authorization' => 'Bearer ' . env('CHANNEL_ACCESS_TOKEN')];
        $url = 'https://api.line.me/v2/bot/profile/' . $userId;
        $request = (new Helper())->get($url, $header);
        return $request;
    }

    public static function pre_text($text)
    {
        $text = preg_replace('/\<br \/\>/',"", $text);
        $text = preg_replace('/\#n\#/',"\n", $text);
        $text = preg_replace('/<div class="map" style="margin-top: 10px">/',"\n", $text);
        $text = preg_replace('/(<a href=")(.*)a>$/',"\n", $text);
        $text = preg_replace('/\#79\#/',json_decode('["\uDBC0\uDC79"]', true)[0], $text);
        $text = preg_replace('/\#8D\#/',json_decode('["\uDBC0\uDC8D"]', true)[0], $text);
        $text = preg_replace('/\#90\#/',json_decode('["\uDBC0\uDC90"]', true)[0], $text);
        $text = preg_replace('/\#7F\#/',json_decode('["\uDBC0\uDC7F"]', true)[0], $text);
        $text = preg_replace('/\#01\#/',json_decode('["\uDBC0\uDC01"]', true)[0], $text);
        $text = preg_replace('/\#02\#/',json_decode('["\uDBC0\uDC02"]', true)[0], $text);
        $text = preg_replace('/\#03\#/',json_decode('["\uDBC0\uDC03"]', true)[0], $text);
        $text = preg_replace('/\#04\#/',json_decode('["\uDBC0\uDC04"]', true)[0], $text);
        $text = preg_replace('/\#05\#/',json_decode('["\uDBC0\uDC05"]', true)[0], $text);
        $text = preg_replace('/\#09\#/',json_decode('["\uDBC0\uDC09"]', true)[0], $text);
        $text = preg_replace('/\#0A\#/',json_decode('["\uDBC0\uDC0A"]', true)[0], $text);
        $text = preg_replace('/\#0B\#/',json_decode('["\uDBC0\uDC0B"]', true)[0], $text);
        $text = preg_replace('/\#13\#/',json_decode('["\uDBC0\uDC13"]', true)[0], $text);
        $text = preg_replace('/\#29\#/',json_decode('["\uDBC0\uDC29"]', true)[0], $text);
        $text = preg_replace('/\#2D\#/',json_decode('["\uDBC0\uDC2D"]', true)[0], $text);
        $text = preg_replace('/\#2E\#/',json_decode('["\uDBC0\uDC2E"]', true)[0], $text);
        $text = preg_replace('/\#33\#/',json_decode('["\uDBC0\uDC33"]', true)[0], $text);
        $text = preg_replace('/\#31\#/',json_decode('["\uDBC0\uDC31"]', true)[0], $text);
        $text = preg_replace('/\#32\#/',json_decode('["\uDBC0\uDC32"]', true)[0], $text);
        $text = preg_replace('/\#AE\#/',json_decode('["\uDBC0\uDCAE"]', true)[0], $text);
        $text = preg_replace('/\#39\#/',json_decode('["\uDBC0\uDC39"]', true)[0], $text);
        $text = preg_replace('/\#B2\#/',json_decode('["\uDBC0\uDCB2"]', true)[0], $text);
        $text = preg_replace('/\#B3\#/',json_decode('["\uDBC0\uDCB3"]', true)[0], $text);
        $text = preg_replace('/\#41\#/',json_decode('["\uDBC0\uDC41"]', true)[0], $text);
        $text = preg_replace('/\#60\#/',json_decode('["\uDBC0\uDC60"]', true)[0], $text);
        $text = preg_replace('/\#61\#/',json_decode('["\uDBC0\uDC61"]', true)[0], $text);
        $text = preg_replace('/\#62\#/',json_decode('["\uDBC0\uDC62"]', true)[0], $text);
        $text = preg_replace('/\#6C\#/',json_decode('["\uDBC0\uDC6C"]', true)[0], $text);
        $text = preg_replace('/\#77\#/',json_decode('["\uDBC0\uDC77"]', true)[0], $text);
        $text = preg_replace('/\#11\#/',json_decode('["\uDBC0\uDC11"]', true)[0], $text);
        $text = preg_replace('/\#B5\#/',json_decode('["\uDBC0\uDCB5"]', true)[0], $text);
        $text = preg_replace('/\#A9\#/',json_decode('["\uDBC0\uDCA9"]', true)[0], $text);
        $text = preg_replace('/\#A4\#/',json_decode('["\uDBC0\uDCA4"]', true)[0], $text);
        $text = preg_replace('/\#08\#/',json_decode('["\uDBC0\uDC08"]', true)[0], $text);
        $text = preg_replace('/\#27\#/',json_decode('["\uDBC0\uDC27"]', true)[0], $text);
        $text = preg_replace('/\#17\#/',json_decode('["\uDBC0\uDC17"]', true)[0], $text);
        $text = preg_replace('/\#1B\#/',json_decode('["\uDBC0\uDC1B"]', true)[0], $text);
        $text = preg_replace('/\#98\#/',json_decode('["\uDBC0\uDC98"]', true)[0], $text);
        $text = preg_replace('/\#35\#/',json_decode('["\uDBC0\uDC35"]', true)[0], $text);
        $text = preg_replace('/\#78\#/',json_decode('["\uDBC0\uDC78"]', true)[0], $text);
        $text = preg_replace('/\#7A\#/',json_decode('["\uDBC0\uDC7A"]', true)[0], $text);
        $text = preg_replace('/\#7B\#/',json_decode('["\uDBC0\uDC7B"]', true)[0], $text);
        $text = preg_replace('/\#7C\#/',json_decode('["\uDBC0\uDC7C"]', true)[0], $text);
        $text = preg_replace('/\#7D\#/',json_decode('["\uDBC0\uDC7D"]', true)[0], $text);
        $text = preg_replace('/\#7E\#/',json_decode('["\uDBC0\uDC7E"]', true)[0], $text);
        $text = preg_replace('/\#8C\#/',json_decode('["\uDBC0\uDC8C"]', true)[0], $text);
        $text = preg_replace('/\#8E\#/',json_decode('["\uDBC0\uDC8E"]', true)[0], $text);
        $text = preg_replace('/\#8F\#/',json_decode('["\uDBC0\uDC8F"]', true)[0], $text);
        $text = preg_replace('/\#91\#/',json_decode('["\uDBC0\uDC91"]', true)[0], $text);
        $text = preg_replace('/\#92\#/',json_decode('["\uDBC0\uDC92"]', true)[0], $text);
        $text = preg_replace('/\#93\#/',json_decode('["\uDBC0\uDC93"]', true)[0], $text);
        $text = preg_replace('/\#94\#/',json_decode('["\uDBC0\uDC94"]', true)[0], $text);
        $text = preg_replace('/\#95\#/',json_decode('["\uDBC0\uDC95"]', true)[0], $text);
        $text = preg_replace('/\#80\#/',json_decode('["\uDBC0\uDC80"]', true)[0], $text);
        $text = preg_replace('/\#81\#/',json_decode('["\uDBC0\uDC81"]', true)[0], $text);
        $text = preg_replace('/\#82\#/',json_decode('["\uDBC0\uDC82"]', true)[0], $text);
        $text = preg_replace('/\#83\#/',json_decode('["\uDBC0\uDC83"]', true)[0], $text);
        $text = preg_replace('/\#96\#/',json_decode('["\uDBC0\uDC96"]', true)[0], $text);
        $text = preg_replace('/\#97\#/',json_decode('["\uDBC0\uDC97"]', true)[0], $text);
        $text = preg_replace('/\#99\#/',json_decode('["\uDBC0\uDC99"]', true)[0], $text);
        $text = preg_replace('/\#9A\#/',json_decode('["\uDBC0\uDC9A"]', true)[0], $text);
        $text = preg_replace('/\#9B\#/',json_decode('["\uDBC0\uDC9B"]', true)[0], $text);
        $text = preg_replace('/\#9C\#/',json_decode('["\uDBC0\uDC9C"]', true)[0], $text);
        $text = preg_replace('/\#9D\#/',json_decode('["\uDBC0\uDC9D"]', true)[0], $text);
        $text = preg_replace('/\#9E\#/',json_decode('["\uDBC0\uDC9E"]', true)[0], $text);
        $text = preg_replace('/\#84\#/',json_decode('["\uDBC0\uDC84"]', true)[0], $text);
        $text = preg_replace('/\#85\#/',json_decode('["\uDBC0\uDC85"]', true)[0], $text);
        $text = preg_replace('/\#86\#/',json_decode('["\uDBC0\uDC86"]', true)[0], $text);
        $text = preg_replace('/\#87\#/',json_decode('["\uDBC0\uDC87"]', true)[0], $text);
        $text = preg_replace('/\#88\#/',json_decode('["\uDBC0\uDC88"]', true)[0], $text);
        $text = preg_replace('/\#89\#/',json_decode('["\uDBC0\uDC89"]', true)[0], $text);
        $text = preg_replace('/\#8A\#/',json_decode('["\uDBC0\uDC8A"]', true)[0], $text);
        $text = preg_replace('/\#8B\#/',json_decode('["\uDBC0\uDC8B"]', true)[0], $text);
        $text = preg_replace('/\#9F\#/',json_decode('["\uDBC0\uDC9F"]', true)[0], $text);
        $text = preg_replace('/\#06\#/',json_decode('["\uDBC0\uDC06"]', true)[0], $text);
        $text = preg_replace('/\#07\#/',json_decode('["\uDBC0\uDC07"]', true)[0], $text);
        $text = preg_replace('/\#0C\#/',json_decode('["\uDBC0\uDC0C"]', true)[0], $text);
        $text = preg_replace('/\#0D\#/',json_decode('["\uDBC0\uDC0D"]', true)[0], $text);
        $text = preg_replace('/\#0E\#/',json_decode('["\uDBC0\uDC0E"]', true)[0], $text);
        $text = preg_replace('/\#0F\#/',json_decode('["\uDBC0\uDC0F"]', true)[0], $text);
        $text = preg_replace('/\#10\#/',json_decode('["\uDBC0\uDC10"]', true)[0], $text);
        $text = preg_replace('/\#12\#/',json_decode('["\uDBC0\uDC12"]', true)[0], $text);
        $text = preg_replace('/\#14\#/',json_decode('["\uDBC0\uDC14"]', true)[0], $text);
        $text = preg_replace('/\#15\#/',json_decode('["\uDBC0\uDC15"]', true)[0], $text);
        $text = preg_replace('/\#16\#/',json_decode('["\uDBC0\uDC16"]', true)[0], $text);
        $text = preg_replace('/\#18\#/',json_decode('["\uDBC0\uDC18"]', true)[0], $text);
        $text = preg_replace('/\#19\#/',json_decode('["\uDBC0\uDC19"]', true)[0], $text);
        $text = preg_replace('/\#1A\#/',json_decode('["\uDBC0\uDC1A"]', true)[0], $text);
        $text = preg_replace('/\#1C\#/',json_decode('["\uDBC0\uDC1C"]', true)[0], $text);
        $text = preg_replace('/\#1D\#/',json_decode('["\uDBC0\uDC1D"]', true)[0], $text);
        $text = preg_replace('/\#1E\#/',json_decode('["\uDBC0\uDC1E"]', true)[0], $text);
        $text = preg_replace('/\#1F\#/',json_decode('["\uDBC0\uDC1F"]', true)[0], $text);
        $text = preg_replace('/\#20\#/',json_decode('["\uDBC0\uDC20"]', true)[0], $text);
        $text = preg_replace('/\#21\#/',json_decode('["\uDBC0\uDC21"]', true)[0], $text);
        $text = preg_replace('/\#22\#/',json_decode('["\uDBC0\uDC22"]', true)[0], $text);
        $text = preg_replace('/\#23\#/',json_decode('["\uDBC0\uDC23"]', true)[0], $text);
        $text = preg_replace('/\#5D\#/',json_decode('["\uDBC0\uDC5D"]', true)[0], $text);
        $text = preg_replace('/\#5F\#/',json_decode('["\uDBC0\uDC5F"]', true)[0], $text);
        $text = preg_replace('/\#5E\#/',json_decode('["\uDBC0\uDC5E"]', true)[0], $text);
        $text = preg_replace('/\#A0\#/',json_decode('["\uDBC0\uDCA0"]', true)[0], $text);
        $text = preg_replace('/\#A1\#/',json_decode('["\uDBC0\uDCA1"]', true)[0], $text);
        $text = preg_replace('/\#24\#/',json_decode('["\uDBC0\uDC24"]', true)[0], $text);
        $text = preg_replace('/\#A2\#/',json_decode('["\uDBC0\uDCA2"]', true)[0], $text);
        $text = preg_replace('/\#A3\#/',json_decode('["\uDBC0\uDCA3"]', true)[0], $text);
        $text = preg_replace('/\#A5\#/',json_decode('["\uDBC0\uDCA5"]', true)[0], $text);
        $text = preg_replace('/\#A6\#/',json_decode('["\uDBC0\uDCA6"]', true)[0], $text);
        $text = preg_replace('/\#A7\#/',json_decode('["\uDBC0\uDCA7"]', true)[0], $text);
        $text = preg_replace('/\#26\#/',json_decode('["\uDBC0\uDC26"]', true)[0], $text);
        $text = preg_replace('/\#2A\#/',json_decode('["\uDBC0\uDC2A"]', true)[0], $text);
        $text = preg_replace('/\#2B\#/',json_decode('["\uDBC0\uDC2B"]', true)[0], $text);
        $text = preg_replace('/\#2C\#/',json_decode('["\uDBC0\uDC2C"]', true)[0], $text);
        $text = preg_replace('/\#2F\#/',json_decode('["\uDBC0\uDC2F"]', true)[0], $text);
        $text = preg_replace('/\#3A\#/',json_decode('["\uDBC0\uDC3A"]', true)[0], $text);
        $text = preg_replace('/\#A8\#/',json_decode('["\uDBC0\uDCA8"]', true)[0], $text);
        $text = preg_replace('/\#AA\#/',json_decode('["\uDBC0\uDCAA"]', true)[0], $text);
        $text = preg_replace('/\#AB\#/',json_decode('["\uDBC0\uDCAB"]', true)[0], $text);
        $text = preg_replace('/\#AC\#/',json_decode('["\uDBC0\uDCAC"]', true)[0], $text);
        $text = preg_replace('/\#AD\#/',json_decode('["\uDBC0\uDCAD"]', true)[0], $text);
        $text = preg_replace('/\#30\#/',json_decode('["\uDBC0\uDC30"]', true)[0], $text);
        $text = preg_replace('/\#36\#/',json_decode('["\uDBC0\uDC36"]', true)[0], $text);
        $text = preg_replace('/\#37\#/',json_decode('["\uDBC0\uDC37"]', true)[0], $text);
        $text = preg_replace('/\#38\#/',json_decode('["\uDBC0\uDC38"]', true)[0], $text);
        $text = preg_replace('/\#AF\#/',json_decode('["\uDBC0\uDCAF"]', true)[0], $text);
        $text = preg_replace('/\#B0\#/',json_decode('["\uDBC0\uDCB0"]', true)[0], $text);
        $text = preg_replace('/\#B1\#/',json_decode('["\uDBC0\uDCB1"]', true)[0], $text);
        $text = preg_replace('/\#3C\#/',json_decode('["\uDBC0\uDC3C"]', true)[0], $text);
        $text = preg_replace('/\#B4\#/',json_decode('["\uDBC0\uDCB4"]', true)[0], $text);
        $text = preg_replace('/\#40\#/',json_decode('["\uDBC0\uDC40"]', true)[0], $text);
        $text = preg_replace('/\#42\#/',json_decode('["\uDBC0\uDC42"]', true)[0], $text);
        $text = preg_replace('/\#43\#/',json_decode('["\uDBC0\uDC43"]', true)[0], $text);
        $text = preg_replace('/\#44\#/',json_decode('["\uDBC0\uDC44"]', true)[0], $text);
        $text = preg_replace('/\#45\#/',json_decode('["\uDBC0\uDC45"]', true)[0], $text);
        $text = preg_replace('/\#47\#/',json_decode('["\uDBC0\uDC47"]', true)[0], $text);
        $text = preg_replace('/\#49\#/',json_decode('["\uDBC0\uDC49"]', true)[0], $text);
        $text = preg_replace('/\#4A\#/',json_decode('["\uDBC0\uDC4A"]', true)[0], $text);
        $text = preg_replace('/\#4B\#/',json_decode('["\uDBC0\uDC4B"]', true)[0], $text);
        $text = preg_replace('/\#4C\#/',json_decode('["\uDBC0\uDC4C"]', true)[0], $text);
        $text = preg_replace('/\#4D\#/',json_decode('["\uDBC0\uDC4D"]', true)[0], $text);
        $text = preg_replace('/\#4E\#/',json_decode('["\uDBC0\uDC4E"]', true)[0], $text);
        $text = preg_replace('/\#4F\#/',json_decode('["\uDBC0\uDC4F"]', true)[0], $text);
        $text = preg_replace('/\#50\#/',json_decode('["\uDBC0\uDC50"]', true)[0], $text);
        $text = preg_replace('/\#51\#/',json_decode('["\uDBC0\uDC51"]', true)[0], $text);
        $text = preg_replace('/\#53\#/',json_decode('["\uDBC0\uDC53"]', true)[0], $text);
        $text = preg_replace('/\#54\#/',json_decode('["\uDBC0\uDC54"]', true)[0], $text);
        $text = preg_replace('/\#55\#/',json_decode('["\uDBC0\uDC55"]', true)[0], $text);
        $text = preg_replace('/\#56\#/',json_decode('["\uDBC0\uDC56"]', true)[0], $text);
        $text = preg_replace('/\#B6\#/',json_decode('["\uDBC0\uDCB6"]', true)[0], $text);
        $text = preg_replace('/\#57\#/',json_decode('["\uDBC0\uDC57"]', true)[0], $text);
        $text = preg_replace('/\#58\#/',json_decode('["\uDBC0\uDC58"]', true)[0], $text);
        $text = preg_replace('/\#59\#/',json_decode('["\uDBC0\uDC59"]', true)[0], $text);
        $text = preg_replace('/\#B7\#/',json_decode('["\uDBC0\uDCB7"]', true)[0], $text);
        $text = preg_replace('/\#5B\#/',json_decode('["\uDBC0\uDC5B"]', true)[0], $text);
        $text = preg_replace('/\#5C\#/',json_decode('["\uDBC0\uDC5C"]', true)[0], $text);
        $text = preg_replace('/\#B8\#/',json_decode('["\uDBC0\uDCB8"]', true)[0], $text);
        $text = preg_replace('/\#B9\#/',json_decode('["\uDBC0\uDCB9"]', true)[0], $text);
        $text = preg_replace('/\#64\#/',json_decode('["\uDBC0\uDC64"]', true)[0], $text);
        $text = preg_replace('/\#65\#/',json_decode('["\uDBC0\uDC65"]', true)[0], $text);
        $text = preg_replace('/\#66\#/',json_decode('["\uDBC0\uDC66"]', true)[0], $text);
        $text = preg_replace('/\#67\#/',json_decode('["\uDBC0\uDC67"]', true)[0], $text);
        $text = preg_replace('/\#68\#/',json_decode('["\uDBC0\uDC68"]', true)[0], $text);
        $text = preg_replace('/\#69\#/',json_decode('["\uDBC0\uDC69"]', true)[0], $text);
        $text = preg_replace('/\#6A\#/',json_decode('["\uDBC0\uDC6A"]', true)[0], $text);
        $text = preg_replace('/\#6B\#/',json_decode('["\uDBC0\uDC6B"]', true)[0], $text);
        $text = preg_replace('/\#6D\#/',json_decode('["\uDBC0\uDC6D"]', true)[0], $text);
        $text = preg_replace('/\#6E\#/',json_decode('["\uDBC0\uDC6E"]', true)[0], $text);
        $text = preg_replace('/\#6F\#/',json_decode('["\uDBC0\uDC6F"]', true)[0], $text);
        $text = preg_replace('/\#70\#/',json_decode('["\uDBC0\uDC70"]', true)[0], $text);
        $text = preg_replace('/\#71\#/',json_decode('["\uDBC0\uDC71"]', true)[0], $text);
        $text = preg_replace('/\#72\#/',json_decode('["\uDBC0\uDC72"]', true)[0], $text);
        $text = preg_replace('/\#73\#/',json_decode('["\uDBC0\uDC73"]', true)[0], $text);
        $text = preg_replace('/\#74\#/',json_decode('["\uDBC0\uDC74"]', true)[0], $text);
        $text = preg_replace('/\#75\#/',json_decode('["\uDBC0\uDC75"]', true)[0], $text);
        $text = preg_replace('/\#76\#/',json_decode('["\uDBC0\uDC76"]', true)[0], $text);

        return $text;
    }

}
