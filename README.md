This is a script that mocks the real Envato API for verifying purchase codes. 
You can use this to test a purchase code verification system. 

- Real API: `https://api.envato.com/v3/market/author/sale?code=xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx`
- Mock API: `https://sandbox.arcoticsolutions.com/envato/api.php?code=xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx`

For full details on how purchase code verification works, see:
https://forums.envato.com/t/#

### Purchase Codes (Response Type)

- Valid code: `829862b2-59ef-42c9-894c-665208ac2f41`
  - Returns `200` with sale information.
- Invalid code: `94252c00-df24-4cf5-99dd-49fc17e23043`
  - Returns `404` with an error object.
- Improper code: `02b6429f-9274-9a70-03ce49bc5a48`
  - This will trigger a `403` status code with a CF 1020 error code in the body, because the code isn't formatted correctly. This is here for the sake of completion, but you really should check the format of purchase codes before sending them to the API.
```
