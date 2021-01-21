from flask import Flask, jsonify, request
from http import HTTPStatus

app = Flask(__name__)

recipes = [
    {
        'id': 1,
        'name': 'Egg Salad',
        'description': 'This is a lovely egg salad recipe.'
    },
    {
        'id': 2, 'name': 'Tomato Pasta',
        'description': 'This is a lovely tomato pasta recipe.'
    }
]


@app.route("/")
def hello():
    return "Hello World!"

# Get recipe
# Ex.: http GET localhost:5000/recipes
@app.route('/recipes', methods=['GET'])
def get_recipes():
    return jsonify({'data': recipes})

# Get recipe by id
# Ex.: http GET localhost:5000/recipes/3
@app.route('/recipes/<int:recipe_id>', methods=['GET'])
def get_recipe(recipe_id):
    recipe = next((recipe for recipe in recipes if recipe['id'] == recipe_id), None)
    if recipe:
        return jsonify(recipe)
    return jsonify({'message': 'recipe not found'}), HTTPStatus.NOT_FOUND

# Create recipe
# Ex.: http POST localhost:5000/recipes name="Cheese Pizza" description="This is a lovely cheese pizza"
@app.route('/recipes', methods=['POST'])
def create_recipe():
    data = request.get_json()
    name = data.get('name')
    description = data.get('description')
    recipe = {
        'id': len(recipes) + 1,
        'name': name,
        'description': description
    }
    recipes.append(recipe)

    return jsonify(recipe), HTTPStatus.CREATED 

# Update recipe
# Ex.: http PUT localhost:5000/recipes/3 name="Lovely Cheese Pizza" description="This is a lovely cheese pizza recipe."
@app.route('/recipes/<int:recipe_id>', methods=['PUT'])
def update_recipe(recipe_id):
    recipe = next((recipe for recipe in recipes if recipe['id'] == recipe_id), None)

    if not recipe:
        return jsonify({'message': 'recipe not found'}), HTTPStatus.NOT_FOUND
    
    data = request.get_json()

    recipe.update(
        {
            'name': data.get('name'),
            'description': data.get('description')
        }
    )

    return jsonify(recipe)


if __name__ == "__main__":
    app.run()
