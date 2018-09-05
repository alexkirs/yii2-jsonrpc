<?php
namespace api\tests;

use tests\Tester;

class BodyParamsCest
{
    public function checkBodyParamsPassMethod(Tester $I)
    {
        $I->wantTo('Check passing params in body');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPOST('body-params-json-rpc', [
            "jsonrpc" => "2.0",
            "method" => "demo.sum-integer-list",
            "params" => [1, 2, 3, 4, 4.5, "foo", "bar", false],
            "id" => 1
        ]);
        $I->seeResponseCodeIs(200);

        $I->seeResponseContainsJson([
            'result' => 10
        ]);
    }
}
