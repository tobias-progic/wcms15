# API-filer

API = Application Programming Interface

API:t i era projekt (Swedish Rummy) är filer som anropas direkt av Javascript via AJAX.
Så länge er javascriptkod vet vilka filer som används till vad (t.ex. lista spelarens hand) och vad ett sådant anrop returnerar så behöver inte javascript bry sig om vad som finns bakom.

D.v.s. API:t är "kontraktet" mellan två moduler och de båda modulernas interna implementation är inte av intresse för de respektive modulerna.

Er Javascript-kod behöver inte veta något om era PHP-klasser så länge t.ex. "get_player.php" gör vad den ska. 


```
Javascript      Api-filer
+----+          +----+
|    |    API   |    |
|    |<-------->|    | --- [Era klassfiler]
|    |          |    |
+----+          +----+

```

