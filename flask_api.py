from flask import Flask, request, jsonify
import joblib
import numpy as np

app = Flask(__name__)
# Load your model
model = joblib.load("ex-recommander.joblib")
@app.route('/predict', methods=['POST'])
def predict():
    # Get JSON data from POST request
    data = request.get_json()
    # Extract features: ensure 'Age' and 'KnowledgeLevel' are passed in JSON
    age = data.get("Age")
    knowledge_level = data.get("KnowledgeLevel")
    # Validate inputs
    if age is None or knowledge_level is None:
        return jsonify({"error": "Invalid input. Age and KnowledgeLevel are required."}), 400
    #Predict
    prediction = model.predict([[age, knowledge_level]])
    return jsonify({"predicted_difficulty": int(prediction[0])})
if __name__ == '__main__':
    app.run(debug=True)