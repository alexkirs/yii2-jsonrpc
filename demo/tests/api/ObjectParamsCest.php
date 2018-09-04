<?php
namespace api\tests;

use tests\Tester;

class ObjectParamsCest
{
    public function checkParseParamsAsObject(Tester $I)
    {
        $I->wantTo('Check parsing params as object');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPOST('object-params-json-rpc', [
            "jsonrpc" => "2.0",
            "method" => "demo.object-foo",
            "params" => ['object' => ['foo' => 'this is foo']],
            "id" => 1
        ]);
        $I->seeResponseCodeIs(200);

        $I->seeResponseContainsJson([
            'result' => 'this is foo'
        ]);
    }
}
