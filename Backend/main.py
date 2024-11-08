import os
import google.generativeai as genai

genai.configure(api_key="AIzaSyBjHJSpWpUJTi5oXh3K2jyy2WNv6Ls-r2M")

# Create the model
generation_config = {
  "temperature": 1,
  "top_p": 0.95,
  "top_k": 40,
  "max_output_tokens": 8192,
  "response_mime_type": "text/plain",
}

model = genai.GenerativeModel(
  model_name="gemini-1.5-flash",
  generation_config=generation_config,
)

chat_session = model.start_chat(
  history=[]
)

# organ = PIL.Image.open('panipuri.jpg')
# response = model.generate_content(["whats this", organ])
# print(response.text)

prompt = "who invented the python"

response = chat_session.send_message(prompt)

print("Question: ", prompt, "\n", response.text)