import ky from "ky";

export async function useUsers() {
  const resp = await ky.get("http://localhost:8000/api/users").json();

  return resp.data;
}
