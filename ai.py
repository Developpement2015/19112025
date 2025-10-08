from openai import OpenAI

client = OpenAI(
  base_url="https://openrouter.ai/api/v1",
api_key = "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"
)

completion = client.chat.completions.create(
  extra_headers={
  },
  extra_body={},
  model="google/gemini-2.0-flash-exp:free",
  messages=[
    {
      "role": "user",
      "content": [
        {
          "type": "text",
          "text": "What is in this image?"
        },
        {
          "type": "image_url",
          "image_url": {
            "url": "https://upload.wikimedia.org/wikipedia/commons/thumb/d/dd/Gfp-wisconsin-madison-the-nature-boardwalk.jpg/2560px-Gfp-wisconsin-madison-the-nature-boardwalk.jpg"
          }
        }
      ]
    }
  ]
)
print(completion.choices[0].message.content)
